<?php include 'includes/header.html';
include 'includes/pelayan__navbar.php';
if (!isset($_GET['page'])) {
    header("Location: index.php");
} 
$jmlkos = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_meja WHERE STATUS ='tersedia'"));
$jmldig = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_meja WHERE STATUS ='tidak tersedia'"));
$jmlpem = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_pemesanan"));

?>

<div class="container">
    <div class="welcome__message">
        <P class="mt-5">Selamat datang di dashboard Pelayan</P>
        <P>Silahkan pilih menu pada navigasi bar</P>
    </div>

    <div class="info__owner mt-5">
        <div class="row">
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Meja Kosong</h5>
                        <h3 class="card-text"><?php echo $jmlkos;?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Meja Digunakan</h5>
                        <h3 class="card-text"><?php echo $jmldig;?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Pemesanan</h5>
                        <h3 class="card-text"><?php echo $jmlpem;?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.html' ?>