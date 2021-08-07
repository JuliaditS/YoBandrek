<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php';

$error = array("");
$url = substr($_SERVER['QUERY_STRING'],19);
$menu = mysqli_query($conn, "select * from data_menu where keterangan = 'divalidasi' and stok != 0");
$nopems = $_GET['nopem'][0];
$nomeja = "";
$tmeja = $_GET['nomeja'];
$nomeja = $tmeja[0];
for($i=1; $i<count($tmeja); $i++){
    $nomeja = $nomeja.','.$tmeja[$i];
}
//query keterangan
$tmpket = mysqli_fetch_array(mysqli_query($conn, "select keterangan from detail_pemesanan where no_pemesanan = '$nopems'"))[0];
//query menu

$tmpdata2= mysqli_query($conn, "select * from data_menu where keterangan = 'divalidasi'");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tkode = $_POST['kode'];
    $keterangan = $_POST['keterangan'];
    //builder query
    $nokode = "kode_menu = ".$tkode[0];
    for($i=1; $i<count($tkode); $i++){
        $nokode = $nokode.' OR kode_menu ='.$tkode[$i];
    }
    //query hapus pada data tertentu
    $a =mysqli_query($conn, "SELECT * FROM detail_pemesanan WHERE no_pemesanan = '$nopems' AND kode_menu NOT IN (SELECT kode_menu FROM detail_pemesanan WHERE no_pemesanan = '$nopems' AND ($nokode))");
    
    while($b = mysqli_fetch_array($a)){       
        $tmenu = $b['kode_menu'];
        $e=mysqli_fetch_array(mysqli_query($conn,"select stok from data_menu where kode_menu = '$tmenu'"));
        $tjumlah = $b['jumlah']+$e['stok'];
        
        //query balikin jumlah
        mysqli_query($conn, "UPDATE `data_menu` SET `stok` = '$tjumlah' WHERE `data_menu`.`kode_menu` = '$tmenu'");
        
        mysqli_query($conn, "DELETE FROM `detail_pemesanan` WHERE `no_pemesanan` = '$nopems' AND `kode_menu` = '$tmenu'");
    }
    $no = -1;
    foreach($tkode as $kode){
        $no = $no + 1;
        //query jumlah detail_pemesanan

        $c = mysqli_fetch_array(mysqli_query($conn, "SELECT jumlah, kode_menu FROM detail_pemesanan WHERE detail_pemesanan.no_pemesanan = '$nopems' AND kode_menu = '$kode'"));
        //query stok data_menu
        $d = mysqli_fetch_array(mysqli_query($conn, "select nama, stok from data_menu where kode_menu ='$kode'"));
        mysqli_query($conn, "UPDATE detail_pemesanan SET keterangan ='$keterangan' WHERE kode_menu = '$kode' AND no_pemesanan ='$nopems'");
        $jml = $_POST['jumlah'][$no];
        //validasi
        //stok sama
        if(empty($c['kode_menu'])){
            echo $kode."<br>";
            $aaaa = $d['stok'] - $_POST['jumlah'][$no];
            mysqli_query($conn, "UPDATE data_menu SET stok = '$aaaa' WHERE kode_menu = '$kode'");
            if($aaaa == 0){
                mysqli_query($conn, "UPDATE data_menu SET stok = '$aaaa',status = 'tidak tersedia' WHERE kode_menu = '$kode'");  
            }
            mysqli_query($conn, "INSERT INTO `detail_pemesanan` (`no_pemesanan`, `kode_menu`, `keterangan`, `jumlah`) VALUES ('$nopems', '$kode', '$keterangan', '$jml')");
        }elseif($c['jumlah'] == $_POST['jumlah'][$no]){
            //do nothing
        //stok nambah
        }elseif($c['jumlah'] <= $_POST['jumlah'][$no]){
            if(($_POST['jumlah'][$no] - $c['jumlah']) <= 0){
                
                array_push($error,"stok pada ".$d['nama']." kurang.");
            }else{
                $jml = $_POST['jumlah'][$no];
                $tambah = $d['stok'] - ($_POST['jumlah'][$no] - $c['jumlah']);
                //query jalan
                if($tambah == 0){
                    mysqli_query($conn, "UPDATE data_menu SET stok = '$tambah',status = 'tidak tersedia' WHERE kode_menu = '$kode'");  
                }
                mysqli_query($conn, "UPDATE detail_pemesanan SET jumlah='$jml' WHERE no_pemesanan ='$nopems' AND kode_menu = '$kode'");
               mysqli_query($conn, "UPDATE data_menu SET stok = '$tambah' WHERE kode_menu = '$kode'");
                //update jumlah detail_pemesanan
                mysqli_query($conn,"UPDATE detail_pemesanan SET jumlah ='$jml' WHERE no_pemesanan ='$nopems' AND kode_menu = '$kode'");
            }
        //stok kurang   
        }elseif($c['jumlah'] >= $_POST['jumlah'][$no]){
            $pengurangan = ($c['jumlah'] - $_POST['jumlah'][$no])+$d['stok'];
            $jml = $_POST['jumlah'][$no];
            if($pengurangan == 0){
                mysqli_query($conn, "UPDATE data_menu SET stok = '$pengurangan',status = 'tidak tersedia' WHERE kode_menu = '$kode'");  
            }
            //update stok data_menu
            mysqli_query($conn, "UPDATE `data_menu` SET `stok` = '$pengurangan' WHERE `data_menu`.`kode_menu` = '$kode'");
            //update jumlah detail_pemesanan
            mysqli_query($conn,"UPDATE detail_pemesanan SET jumlah ='$jml' WHERE no_pemesanan ='$nopems' AND kode_menu = '$kode'");
        }
        
        if(!empty($error)){
            header("Location: ?page=pemesanan");
        }
    }

}
?>

<div class="container">
    <h5 class="my-4">Edit Pesanan</h5>
    <div class="row">
        <div class="col-md-4">
            <form action="?page=editpemesanan&<?php echo $url;?>" method="POST" class="form-inline justify-content-center">
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        <label class="col-form-label">Nomor Meja</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" value="<?php echo $nomeja;?>" class="form-control" readonly></input>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        <label class="col-form-label">Keterangan</label>
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" name="keterangan"><?php echo $tmpket; ?></textarea>
                    </div>
                </div>


                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        <label class="col-form-label"></label>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btnnew__medium">Edit</button>
                    </div>
                </div>
            
            </div>
            <div class="col-md-8">
                <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th class="col-md-2">Nama Menu</th>
                    <th class="col-md-2">Harga</th>
                    <th class="col-md-1">Jumlah</th>
                </tr>
                <?php 
                while($tmp2 = mysqli_fetch_array($tmpdata2)){
                $e = $tmp2['kode_menu'];
                $d= mysqli_fetch_array(mysqli_query($conn, "SELECT `data_pemesanan`.`no_pemesanan`, `detail_pemesanan`.`jumlah`,data_menu.`kode_menu`, `data_menu`.nama, data_menu.`harga`,data_menu.`stok` FROM `data_pemesanan` JOIN `detail_pemesanan` ON `detail_pemesanan`.`no_pemesanan` = `data_pemesanan`.`no_pemesanan`  JOIN `data_menu` ON `detail_pemesanan`.`kode_menu` = `data_menu`.`kode_menu` WHERE data_pemesanan.`no_pemesanan` = '$nopems' AND `data_menu`.kode_menu = '$e'"));   
                ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" id="<?php echo $tmp2['kode_menu'];?>" name="kode[]" type="checkbox" value="<?php echo $tmp2['kode_menu'];?>" id="flexCheckDefault" onclick="myFunction(this)" 
                            <?php 
                            if(!empty($d['kode_menu'])){
                                echo "checked";
                            }
                            ?>
                            > 
                            
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $tmp2['nama'];?>
                            </label>
                        </div>
                    </td>
                    
                            
                    <td>
                        <?php echo rupiah($tmp2['harga']); ?>
                    </td>
                    <td><?php if(empty($d['kode_menu'])){ $lenght = strlen($tmp2['stok']); }else{ $lenght = strlen($d['jumlah']+$d['stok']); }?>
                        
                        <input name="jumlah[]" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        <?php 
                        if($tmp2['stok']==0 AND $d['jumlah']==0)
                        {
                            echo "min=0 max=0";
                        }else{ 
                            $max = $d['jumlah']+$tmp2['stok'];
                        echo  "min=1 max=".$max;
                        } ?> maxlength="<?php echo $lenght; ?>" id="jumlah<?php echo $tmp2['kode_menu'];?>"  
                        <?php if(!empty($d['kode_menu'])){ ?> 
                            value="<?php echo $d['jumlah'];?>"
                        <?php } if(empty($d['kode_menu'])){ ?>
                            disabled
                        <?php } ?>>
                    </td>
                </tr>              
                <?php 
                } ?>
            </table>
            </form>
        </div>
    </div>
</div>
<script>
    function myFunction(test) {
        // Get the checkbox
        var checkBox = test.value;
        if (test.checked == true) {
            document.getElementById("jumlah" + test.value).disabled = false;    
        } else {
            document.getElementById("jumlah" + test.value).disabled = true;   
        }
    }
</script>
<?php include 'includes/footer.html' ?>