<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php';
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
$tmpdata= mysqli_query($conn, "SELECT `data_pemesanan`.`no_pemesanan`, `detail_pemesanan`.`jumlah`,data_menu.`kode_menu`, `data_menu`.nama, data_menu.`harga` FROM `data_pemesanan` JOIN `detail_pemesanan` ON `detail_pemesanan`.`no_pemesanan` = `data_pemesanan`.`no_pemesanan`  JOIN `data_menu` ON `detail_pemesanan`.`kode_menu` = `data_menu`.`kode_menu` WHERE data_pemesanan.`no_pemesanan` = '$nopems'");

//baru sampe sini
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
                        <button type="submit" class="btn btnnew__medium">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th class="col-md-2">Nama Menu</th>
                    <th class="col-md-2">Harga</th>
                    <th class="col-md-1">Jumlah</th>
                </tr>
                <?php 
                while($tmp2 = mysqli_fetch_array($tmpdata)){
                ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" id="<?php echo $tmp2['kode_menu'];?>" name="kode[]" type="checkbox" value="<?php echo $tmp2['kode_menu'];?>" id="flexCheckDefault" onclick="myFunction(this)">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $tmp2['nama'];?>
                            </label>
                        </div>
                    </td>
                    <td>
                        Rp. <?php echo $tmp2['harga']; ?>
                    </td>
                    <td>
                        <input name="jumlah[]" type="number" id="jumlah<?php echo $tmp2['kode_menu'];?>" value="<?php echo $tmp2['jumlah'];?>"disabled>
                    </td>
                </tr>
                <?php } ?>
            </table>
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