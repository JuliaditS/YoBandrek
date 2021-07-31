<?php 
include 'includes/header.html';
include 'includes/barista__navbar.php'; 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    if(empty(trim($_POST['kodemenu'])))
    {
        header("Location: ?page=tambahrekomendasi&error=5");
    }elseif(empty(trim($_POST['namamenu'])))
    {
        header("Location: ?page=tambahrekomendasi&error=5");
    }elseif(empty(trim($_POST['inlineRadioOptions'])))
    {
        header("Location: ?page=tambahrekomendasi&error=5");
    }elseif(empty(trim($_POST['sharga'])))
    {
        header("Location: ?page=tambahrekomendasi&error=5");
    }else{
        $kodemenu = $_POST['kodemenu'];
        $namamenu = $_POST['namamenu'];
        $jenis = $_POST['inlineRadioOptions'];
        $saranharga = $_POST['sharga'];
        $query = mysqli_query($conn, "INSERT INTO `data_menu` (`kode_menu`, `nama`, `jenis`, `harga`, `keterangan`, `status`, `diskon`, `stok`) VALUES ('$kodemenu', '$namamenu', '$jenis', '$saranharga', 'blm divalidasi', 'tidak tersedia', '0', '0')");
        if($query){
            header("Location: ?page=listmenub");
            mysqli_close($conn); 
        }else{
            header("Location: ?page=tambahrekomendasi&error=6");  
        }
        
    }
    
}

?>

<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container mt-3">
            <h5 class="mb-3 mt-4">Tambah Rekomendasi Menu</h5>
            <?php include "./errorinfo.php"; ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-form">
                        <form action="?page=tambahrekomendasi" method="POST" class="form-inline justify-content-center">
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Kode Menu</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="kodesearch" class="form-control" name="kodemenu" onkeyup="search_kod(this.value);"></input>
                                    <span class="help-block" id=cek></span>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Nama Menu</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="namamenu">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Jenis</label>
                                </div>
                                <div class="col-md-6" name="jenis">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="panas">
                                        <label class="form-check-label" for="inlineRadio1">Panas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="dingin">
                                        <label class="form-check-label" for="inlineRadio2">Dingin</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Saran Harga</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Rp" class="form-control" name="sharga">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn__search ">Submit</button>
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
function search_kod(elem){
        //no reason to create a jQuery object just use this.value
          var kodemenu = document.getElementById("kodesearch").value;
          $.post("barista/checkkode.php",
            {
                kodemenu
            },
            function(data,status){
                document.getElementById("cek").innerHTML = data;
            });
}
</script>
<?php include 'includes/footer.html' ?>