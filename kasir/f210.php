<?php
include 'includes/header.html';
include 'includes/kasir__navbar.php';
if (!isset($_GET['page'])) {
    header("Location: index.php");
}
$jmltra = mysqli_num_rows(mysqli_query($conn, "select * from data_pembayaran"));
$menpem = mysqli_num_rows(mysqli_query($conn, "SELECT `data_pemesanan`.`no_pemesanan`, `data_pemesanan`.* FROM `data_pemesanan` WHERE no_pemesanan NOT IN (SELECT no_pemesanan FROM data_pembayaran)"));
$pend   = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(total_harga) AS total FROM data_pembayaran"));
?>

<div class="container">
    <div class="welcome__message">
        <P class="mt-5">Selamat datang di dashboard kasir</P>
        <P>Silahkan pilih menu pada navigasi bar</P>
    </div>

    <div class="info__owner mt-5">
        <div class="row">
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Transaksi</h5>
                        <h3 class="card-text"><?php echo $jmltra; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Menunggu Pembayaran</h5>
                        <h3 class="card-text"><?php echo $menpem; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Pemasukan</h5>
                        <h3 class="card-text">Rp. <?php echo $pend['total']; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.html' ?>