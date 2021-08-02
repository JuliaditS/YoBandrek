<?php
if (!isset($_GET['page'])) {
    header("Location: index.php");
} 
include 'includes/header.html';
include 'includes/owner__navbar.php'; 

$pesan ="";
$onuser = $_GET['onpegawai'];
$ambil = mysqli_query($conn, "select * from data_pegawai where id_pegawai='$onuser'");
$data = mysqli_fetch_array($ambil);

if(isset($_POST['submit'])){
    $id_pegawai = htmlspecialchars($_POST['id_pegawai']);
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
        $update = mysqli_query($conn, "UPDATE data_pegawai SET 
            username = '$username',
            password = '$md5',
            nama = '$nama',
            level = '$level'
            WHERE id_Pegawai = $id_pegawai");
        if($update){
            $pesan = "<div class='alert alert-success' role='alert'>
                      Edit data pegawai berhasil
                    </div>";
                    header("Refresh:2; url=?page=listpegawai&level=".$_POST['level']);
                    
        }else{
            $pesan = "<div class='alert alert-danger' role='alert'>
                      Edit data pegawai gagal
                    </div>";
        }
    }
}
?>
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container mt-3">
            <h5 class="mt-5 mb-4">Edit data pegawai</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-form">
                        <form action="?page=editpegawai&onpegawai=<?php echo $onuser;?>" method="POST" class="form-inline justify-content-center">
                            <?= $pesan; ?>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Nama</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" name="id_pegawai" value="<?php echo $data['id_Pegawai'];?>">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'];?>">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Username</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="<?php echo $data['username'];?>">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Password</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password baru..">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Level</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example" name="level">
                                        <option selected>Pilih level</option>
                                        <option <?php if($data['level']=='owner'){echo "selected";} ?> value="owner">Owner</option>
                                        <option <?php if($data['level']=='pelayan'){echo "selected";} ?> value="pelayan">Pelayan</option>
                                        <option <?php if($data['level']=='barista'){echo "selected";} ?> value="barista">Barista</option>
                                        <option <?php if($data['level']=='kasir'){echo "selected";} ?> value="kasir">Kasir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btnnew__medium ">Submit</button>
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