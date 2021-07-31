<?php 
include 'includes/header.html';
include 'includes/pelayan__navbar.php'; 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $noja = $_POST['nomeja'];
    $jukur= $_POST['jukur'];
    mysqli_query($conn, "INSERT INTO `data_meja` (`no_meja`, `jumlah_kursi`) VALUES ('$noja', '$jukur')");
    mysqli_query($conn, "INSERT INTO `detail_meja` (`no_meja`, `no_pemesanan`, `status`) VALUES ('$noja', NULL, 'tersedia')");
    header("location: ?page=listmeja");
}
?>
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container mt-3">
            <h5 class="mb-3">Tambah Meja</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-form">
                        <form action="?page=tambahmeja" method="POST" class="form-inline justify-content-center">
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Nomor Meja</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" id="nomeja" onkeyup=nomor(this) name="nomeja" class="form-control"></input>
                                    <span id="cek"></span>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Jumlah Kursi</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="jukur" class="form-control">
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

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function nomor(elem){
        //no reason to create a jQuery object just use this.value
          var nomor = document.getElementById("nomeja").value;
          $.post("pelayan/ceknomormeja.php",
            {
                nomor
            },
            function(data,status){
                document.getElementById("cek").innerHTML = data;
            });
}
</script>
<?php include 'includes/footer.html' ?>