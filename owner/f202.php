<?php 
if (!isset($_GET['page'])) {
    header("Location: index.php");
} 
include 'includes/header.html';
include 'includes/owner__navbar.php'; 

$pesan ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){ 

    $nama   = htmlspecialchars($_POST['nama']);
    $username   = htmlspecialchars($_POST['username']);
    $password   = htmlspecialchars($_POST['password']);
    $level  = htmlspecialchars($_POST['level']);
    
    if (empty($nama) && empty($username) && empty($password)) {
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Isi semua data terlebih dahulu!
                    </div>";    
    }elseif(empty($nama)){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Nama wajib diisi!
                    </div>";
    }elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Nama hanya boleh menggunakan Huruf!
                    </div>";
    }elseif(empty($username)){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Username wajib diisi!
                    </div>";
    }elseif(!preg_match("/^[a-z0-9 ]*$/", $username)){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Username hanya boleh menggunakan huruf kecil dan angka!
                    </div>";
    }elseif(empty($password)){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Password wajib diisi!
                    </div>";       
    }elseif(strlen($password) < 8) {
        $pesan = "<div class='alert alert-danger' role='alert'>
                  Password harus 8 karakter!
                </div>";
        
    }elseif(empty($_POST['level'])){
        $pesan = "<div class='alert alert-danger' role='alert'>
                      Level wajib diisi!
                    </div>";
    }else{
        $md5 = md5($password);
        $masuk = mysqli_query($conn, "INSERT INTO `data_pegawai` (`id_Pegawai`, `username`, `password`, `nama`, `level`) VALUES (NULL, '$username', '$md5', '$nama', '$level')");
        if($masuk){
            $pesan = "<div class='alert alert-success' role='alert'>
                      Tambah data pegawai berhasil
                    </div>";
                    header("Refresh:2; url=?page=listpegawai&level=".$_POST['level']);
                    
        }else{
            $pesan = "<div class='alert alert-danger' role='alert'>
                      Tambah data pegawai gagal
                    </div>";
        }
    }
    
}
?>

<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container mt-3">
            <h5 class="mt-5 mb-4">Tambah data pegawai</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-form">
                        <form action="?page=tambahpegawai" method="POST" class="form-inline justify-content-center">
                        <?php echo $pesan; ?>    
                        <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Nama</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="nama" class="form-control"></input>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Username</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Password</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Level</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" name="level" aria-label="Default select example">
                                        <option selected>Pilih level</option>
                                        <option value="owner">Owner</option>
                                        <option value="pelayan">Pelayan</option>
                                        <option value="barista">Barista</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btnnew__medium">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.html' ?>