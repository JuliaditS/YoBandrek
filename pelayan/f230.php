<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php' ?>
<?php if (!isset($_GET['page'])) {
    header("Location: index.php");
} ?>

<div class="container">
    <div class="welcome__message">
        <P class="mt-5">Selamat datang di dashboard Barista</P>
        <P>Silahkan pilih menu pada navigasi bar</P>
    </div>

    <div class="info__owner mt-5">
        <div class="row">
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Meja Kosong</h5>
                        <h3 class="card-text">20</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumllah Meja Digunakan</h5>
                        <h3 class="card-text">20</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Pemesanan</h5>
                        <h3 class="card-text">2.723</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.html' ?>