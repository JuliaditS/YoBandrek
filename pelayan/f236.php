<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php';
$url = substr($_SERVER['QUERY_STRING'],21);
$menu = mysqli_query($conn, "select * from data_menu where keterangan = 'divalidasi' and stok != 0");
$nomeja = "";
$tmeja = $_GET['nomeja'];
$nomeja = $tmeja[0];
for($i=1; $i<count($tmeja); $i++){
$nomeja = $nomeja.','.$tmeja[$i];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ket       = $_POST['keterangan'];
    $idpegawai = $_SESSION["id_Pegawai"];
    $jumlah = $_POST['jumlah'];
    //tabel pemesanan
    mysqli_query($conn, "INSERT INTO `data_pemesanan` (`no_pemesanan`, `id_pelayan`, `status_pesanan`) VALUES (NULL, '$idpegawai', 'diproses')");
    //get no pemesanan
    $getnopem = mysqli_fetch_array(mysqli_query($conn, "SELECT no_pemesanan FROM `data_pemesanan` ORDER BY `data_pemesanan`.`no_pemesanan` DESC"));
    $nopem = $getnopem[0];

    foreach($tmeja as $meja){
        mysqli_query($conn, "UPDATE `data_meja` SET `no_pemesanan` = '$nopem', `status` = 'tidak tersedia' WHERE `data_meja`.`no_meja` = $meja");
    }
    $no = -1;
    foreach($_POST['kode'] as $kode){
    $no = $no + 1;
    $jumlahs = $jumlah[$no];
        //query insert data
    mysqli_query($conn, "INSERT INTO `detail_pemesanan` (`no_pemesanan`, `kode_menu`, `keterangan`, `jumlah`) VALUES ('$nopem', '$kode', '$ket', '$jumlahs')");
    //query data stok
    $tmpdata = mysqli_fetch_array(mysqli_query($conn, "select * from data_menu where kode_menu = '$kode'"));
    $tmpstok = $tmpdata['stok'] - $jumlahs;
    //query datamenu kurang stok
        mysqli_query($conn, "UPDATE `data_menu` SET `stok` = '$tmpstok' WHERE `data_menu`.`kode_menu` = '$kode'");
    }
header("location: ?page=pemesanan");
}
?>

<div class="container">
    <h5 class="my-4">Tambah Pesanan</h5>
    <div class="row">
        <div class="col-md-4">
            <form action="?page=tambahpemesanan&<?php echo $url;?>" method="POST" class="form-inline justify-content-center">
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        
                        <label class="col-form-label">Nomor Meja</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" value="<?php echo $nomeja; ?>" class="form-control" readonly></input>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        <label class="col-form-label">Keterangan</label>
                    </div>
                    <div class="col-md-6">
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                </div>


                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        <label class="col-form-label"></label>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btnnew__medium ">Tambah</button>
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
                while($data = mysqli_fetch_array($menu)){
                ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" id="<?php echo $data['kode_menu'];?>" name="kode[]" type="checkbox" value="<?php echo $data['kode_menu'];?>" id="flexCheckDefault" onclick="myFunction(this)">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $data['nama'];?>
                            </label>
                        </div>
                    </td>
                    <td>
                        Rp. <?php echo $data['harga']; ?>
                    </td>
                    <td>
                        <input name="jumlah[]" type="number" id="jumlah<?php echo $data['kode_menu'];?>" min="1" max="<?php echo $data['stok'];?>"disabled>
                    </td>
                </tr>
                <?php } ?>
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
            document.getElementById("jumlah" + test.value).value = "1";
        } else {
            document.getElementById("jumlah" + test.value).value = "";
            document.getElementById("jumlah" + test.value).disabled = true;
        }
    }
</script>
<?php include 'includes/footer.html' ?>