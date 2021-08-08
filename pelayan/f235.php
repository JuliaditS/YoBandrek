<?php
include 'includes/header.html';
include 'includes/pelayan__navbar.php';
$no = $_GET['onmeja'];
$meja = mysqli_fetch_array(mysqli_query($conn, "select * from data_meja where no_meja='$no'"));
$pesan= "";
if (isset($_POST['submit'])) {
    $noja = $_POST['nomeja'];
    $jukur = $_POST['jukur'];


    if(($noja == "") && ($jukur=="")){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Isi semua data terlebih dahulu!
                    </div>";                
    }elseif($noja == ""){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Nomor meja tidak boleh kosong!
                    </div>"; 
    }elseif($jukur == ""){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Jumlah kursi tidak boleh kosong!
                    </div>"; 
    }else{
        $edit = mysqli_query($conn, "UPDATE `data_meja` SET `no_meja` = '$noja', `jumlah_kursi` = '$jukur' WHERE `data_meja`.`no_meja` = $no");
        if($edit){
            $pesan = "<div class='alert alert-success' role='alert'>
                          Edit meja berhasil
                        </div>";
        header("Refresh:2, url=?page=listmeja");
        }else{
            $pesan = "<div class='alert alert-danger' role='alert'>
                      Edit meja gagal!
                    </div>";
        }
    }
}
?>
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container mt-3">
            <h5 class="mb-3">Edit Meja</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-form">
                        <form action="?page=editmeja&onmeja=<?php echo $no; ?>" method="POST" class="form-inline justify-content-center">
                            <?= $pesan; ?>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Nomor Meja</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" id="nomeja" onkeyup=nomor(this) name="nomeja" min="1" max="100" value="<?php echo $meja['no_meja']; ?>" class="form-control"></input>
                                    <span id="cek"></span>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Jumlah Kursi</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="jukur"  min="1" max="20" value="<?php echo $meja['jumlah_kursi']; ?>" class="form-control">
                                </div>
                            </div>


                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btnnew__medium ">Simpan</button>
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