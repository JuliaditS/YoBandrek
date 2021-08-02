<?php 
if (!isset($_GET['page'])) {
    header("Location: index.php");
} 
include 'includes/header.html';
include 'includes/owner__navbar.php'; 
$uang = mysqli_query($conn, "select * from data_pembayaran where validasi='divalidasi'");
$menu = mysqli_query($conn, "select * from data_menu where keterangan='divalidasi'");
$pegawai = mysqli_query($conn, "select * from data_pegawai where level !='owner'");
$total = $jumlah = 0;
while($pem = mysqli_fetch_array($uang)){
    $jumlah = $jumlah + 1;
    $total = $total + $pem['total_harga'];

}
?>

<div class="container">
    <div class="welcome__message">
        <P class="mt-5">Selamat datang di dashboard Owner</P>
        <P>Silahkan pilih menu pada navigasi bar</P>
    </div>

    <div class="info__owner mt-3">
        <div class="row">
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Pemasukan</h5>
                        <h3 class="card-text">Rp. <?php echo $total;?></h3>
                        <p>dari <?php echo $jumlah;?> transaksi</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Menu</h5>
                        <h3 class="card-text"><?php echo mysqli_num_rows($menu);?></h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Pegawai</h5>
                        <h3 class="card-text"><?php echo mysqli_num_rows($pegawai);?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.html' ?>