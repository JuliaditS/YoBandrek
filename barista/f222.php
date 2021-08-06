<?php 
include 'includes/header.html';
include 'includes/barista__navbar.php'; 

$query = mysqli_query($conn, "SELECT MAX(kode_menu) as kode_terbesar FROM data_menu");
$data  = mysqli_fetch_array($query);
$kodeBarang  = $data['kode_terbesar'];
$urutan = (int)substr($kodeBarang, 5, 5);
$urutan++;
$huruf = "MENU";
$KodeBaru = $huruf . sprintf("%05s", $urutan);
$pesan = "";

if(isset($_POST['submit'])){
    $kodemenu = $_POST['kodemenu'];
    $namamenu = $_POST['namamenu'];   
    if(empty($kodemenu) && empty($namamenu) && !isset($_POST['inlineRadioOptions']) && empty($_POST['sharga'])){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Isi semua data terlebih dahulu!
                    </div>";
    }elseif(empty($kodemenu)){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Kode menu tidak boleh kosong!
                    </div>";
    }elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $namamenu)) {
        $pesan = "<div class='alert alert-danger' role='alert'>
                          Nama hanya boleh berupa huruf!
                        </div>";
    }elseif(!isset($_POST['inlineRadioOptions'])){
        $pesan = "<div class='alert alert-danger' role='alert'>
                          Harap masukan jenis makanan!
                        </div>";
    }elseif(empty($_POST['sharga'])){
        $pesan = "<div class='alert alert-danger' role='alert'>
                          Harga tidak boleh kosong!
                        </div>";
    }else{
        $jenis = $_POST['inlineRadioOptions'];
        $saranharga = str_replace(".","",$_POST['sharga']) *1;
        $query = mysqli_query($conn, "INSERT INTO `data_menu` (`kode_menu`, `nama`, `jenis`, `harga`, `keterangan`, `status`, `diskon`, `stok`) VALUES ('$kodemenu', '$namamenu', '$jenis', '$saranharga', 'blm divalidasi', 'tidak tersedia', '0', '0')");
        if($query){
            $pesan = "<div class='alert alert-success' role='alert'>
                      Tambah rekomendasi menu berhasil
                    </div>";
            header("Refresh:2; url=?page=listmenub");
            
        }else{
            $pesan = "<div class='alert alert-danger' role='alert'>
                      Tambah rekomendasi menu gagal
                    </div>";  
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
                            <?= $pesan; ?>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Kode Menu</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="kodesearch" class="form-control" name="kodemenu" value="<?= $KodeBaru; ?>" readonly></input>
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
                                    <input type="text" placeholder="Rp" class="form-control format-angka" name="sharga">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btn__search ">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<script>

    $(document).ready(function() {
        // Format mata uang.
        $('.format-angka').mask('0.000.000.000', {
            reverse: true
        });
    })
</script>

<?php include 'includes/footer.html' ?>