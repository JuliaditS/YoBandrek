<?php 
include 'includes/header.html';
include 'includes/kasir__navbar.php';

$pembay = $_GET['bayar'];

$data = mysqli_query($conn, "SELECT `data_pemesanan`.no_pemesanan, `detail_pemesanan`.kode_menu,detail_pemesanan.`jumlah`, `data_menu`.harga,data_menu.`diskon`
FROM `data_pemesanan` 
	JOIN `detail_pemesanan` ON `detail_pemesanan`.`no_pemesanan` = `data_pemesanan`.`no_pemesanan` 
	JOIN `data_menu` ON `detail_pemesanan`.`kode_menu` = `data_menu`.`kode_menu`
	WHERE data_pemesanan.`no_pemesanan` = '$pembay'");
$ttlpem = 0;
$diskon = 0;
$pajak  = 0;
while($out = mysqli_fetch_array($data)){
    $ttlpem = $ttlpem + ($out['harga'] * $out['jumlah']);
    $diskon = $diskon + (($out['harga'] * $out['jumlah'])*(($out['diskon'])/100));
}
$pajak = ($ttlpem-$diskon) * (10/100);
$totalbayar  = $ttlpem - $diskon + $pajak ;
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $p_no = $_POST['nopem'];
    $p_totalpem = $_POST['totalpemesanan'];
    $p_diskon= $_POST['diskon'];
    $p_pajak = $_POST['pajak'];
    $p_bayar = $_POST['bayar'];
    $p_kembali = $_POST['kembalian'];
    $idkasir = $_SESSION["id_Pegawai"];
    mysqli_query($conn, "INSERT INTO `data_pembayaran` (`id_pembayaran`, `no_pemesanan`, `id_kasir`, `total_harga`, `pajak`, `uang_pembayaran`, `uang_kembalian`, `tanggal_pembayaran`, `validasi`, `validator`) VALUES (NULL, '$p_no', '$idkasir', '$p_totalpem', '$pajak', '$p_bayar', '$p_kembali', NOW(), 'blm divalidasi', NULL)");
    header("location: ?page=listdatabayar");
    }
?>

<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container mt-3">
            <div class="tbhdata__search">
                <h5 class="mt-4 mb-5">Pembayaran</h5>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-form">
                        <form action="?page=pembayaran&bayar=<?php echo $pembay;?>" method="POST" class="form-inline justify-content-center" >
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">No Pemesanan</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="nopem" value="<?php echo $pembay;?>" class="form-control" readonly></input>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Total Pemesanan</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="totalpemesanan" value="<?php echo $ttlpem;?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Diskon</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="diskon" value="<?php echo $diskon;?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Pajak</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="pajak" value="<?php echo $pajak;?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Total Bayar</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="totalbayar" name="totalbayar" value="<?php echo $totalbayar;?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Uang Pembayaran</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="uangbayar" name="bayar" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="pembayaran(this)" placeholder="Rp." class="form-control" required>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Uang Kembalian</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Rp." name="kembalian" id="uangkembali" class="form-control" readonly="">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btnnew__medium">Bayar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<script>
    setInterval(function(){
            var uangbayar = (document.getElementById("uangbayar").value * 1);
            var totalharga = document.getElementById("totalbayar").value;
            if (uangbayar < totalharga) {
                document.getElementById("uangkembali").value = "Uang pembayaran kurang";
            } else {
                document.getElementById("uangkembali").value = uangbayar - totalharga;
            }
    }, 10);
    
    
</script>
<?php include 'includes/footer.html' ?>