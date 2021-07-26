<?php include 'includes/header.html' ?>

<?php include 'includes/kasir__navbar.php' ?>
<?php if (!isset($_GET['page'])) {
    header("Location: index.php");
} ?>

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
                        <h3 class="card-text">20</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Menunggu Pembayaran</h5>
                        <h3 class="card-text">5</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Pemasukan</h5>
                        <h3 class="card-text">Rp. 2.000.000</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.html' ?>