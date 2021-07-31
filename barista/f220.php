<?php include 'includes/header.html';
include 'includes/barista__navbar.php';
if (!isset($_GET['page'])) {
    header("Location: index.php");
} 
$jmlpes =mysqli_num_rows(mysqli_query($conn, "SELECT * FROM data_pemesanan"));
$mngpes =mysqli_num_rows(mysqli_query($conn, "SELECT * FROM data_pemesanan WHERE status_pesanan ='diproses'"));
$jmlsiap=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM data_pemesanan WHERE status_pesanan ='disajikan'"));
?>

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
                        <h5 class="card-title">Jumlah Pemesanan</h5>
                        <h3 class="card-text"><?php echo $jmlpes;?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Menunggu Pemesanan</h5>
                        <h3 class="card-text"><?php echo $mngpes;?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card card__infoowner">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Pesanan Siap</h5>
                        <h3 class="card-text"><?php echo $jmlsiap; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include 'includes/footer.html' ?>