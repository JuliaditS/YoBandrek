<?php include 'includes/header.html' ?>

<?php include 'includes/owner__navbar.php' ?>
<?php if (!isset($_GET['page'])) {
    header("Location: index.php");
} ?>

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
                        <h3 class="card-text">Rp. 2.000.000</h3>
                        <p>dari 78 transaksi</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Menu</h5>
                        <h3 class="card-text">7</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Pegawai</h5>
                        <h3 class="card-text">6</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.html' ?>