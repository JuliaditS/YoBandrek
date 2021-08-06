<?php
include 'includes/header.html';
include 'includes/pelayan__navbar.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noja = $_POST['nomeja'];
    $jukur = $_POST['jukur'];
    mysqli_query($conn, "INSERT INTO `data_meja` (`no_meja`, `jumlah_kursi`) VALUES ('$noja', '$jukur')");
    mysqli_query($conn, "INSERT INTO `deta_meja` (`no_meja`, `no_pemesanan`, `status`) VALUES ('$noja', NULL, 'tersedia')");
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
                                    <input type="number" id="nomeja" onkeyup="nomor(this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="nomeja" class="form-control" min="1" max="100"></input>
                                    <span id="cek"></span>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Jumlah Kursi</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="jukur" class="form-control" min="1" max="20" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                            </div>


                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <!-- <button type="submit" class="btn btnnew__medium ">Tambah</button> -->
                                    <button type="button" class="btn btnnew__medium" data-bs-toggle="modal" data-bs-target="#konfirmasitambah">
                                        Tambah
                                    </button>
                                    <div class="modal fade" id="konfirmasitambah" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="konfirmasiModalLabel">Sukses</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Data berhasil ditambahkan
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Oke</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['Submit'])) {
                            $noja = $_POST['nomeja'];
                            $jukur = $_POST['jukur'];

                            // include database connection file
                            include_once("config.php");

                            // Insert user data into table
                            $result = mysqli_query($mysqli, "INSERT INTO `data_meja` (`no_meja`, `jumlah_kursi`) VALUES ('$noja', '$jukur')");

                            // Show message when user added
                            echo "User added successfully. <a href='index.php'>View Users</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function nomor(elem) {
        //no reason to create a jQuery object just use this.value
        var nomor = document.getElementById("nomeja").value;
        $.post("pelayan/ceknomormeja.php", {
                nomor
            },
            function(data, status) {
                document.getElementById("cek").innerHTML = data;
            });
    }
</script>
<?php include 'includes/footer.html' ?>