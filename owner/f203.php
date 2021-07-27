<?php include '../includes/header.html' ?>
<?php include '../includes/owner__navbar.php' ?>
<?php 
    $pesan = "";
    $koneksi = mysqli_connect("localhost", "root", "", "yobandrek");
    $id_Pegawai = $_GET["id_Pegawai"];
    $ambil = mysqli_query($koneksi,"SELECT * FROM data_pegawai WHERE id_Pegawai = $id_Pegawai");
    $data = mysqli_fetch_array($ambil);

    $id_Pegawai = $_POST['id_Pegawai'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    if(isset($_POST['submit'])){
        $query = "UPDATE data_pegawai SET 
                    nama = '$nama',
                    username = '$username',
                    level = '$level'
                    WHERE id_Pegawai = $id_Pegawai ";
        $update = mysqli_query($koneksi, $query);
        if($update){
            $pesan = "<div class='alert alert-success' role='alert'>
                          Uabah data pegawai berhasil
                        </div>";
        }else{
            $pesan = "<div class='alert alert-success' role='alert'>
                          Ubah data pegawai gagal
                        </div>";
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
                        <form action="" method="POST" class="form-inline justify-content-center">
                            <?= $pesan; ?>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Nama</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="id_Pegawai" value="<?= $data['id_Pegawai'] ?>">
                                    <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Username</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="username" class="form-control" value="<?= $data['username'] ?>">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Password</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" readonly class="form-control" value="<?= $data['password'] ?>">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Level</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" name="level" aria-label="Default select example">
                                        <option <?php if ($data['level'] == 'owner') {
                                                echo 'selected';
                                            } ?>>Owner</option>
                                        <option <?php if ($data['level'] == 'pelayan') {
                                                        echo 'selected';
                                                    } ?>>Pelayan</option>
                                        <option <?php if ($data['level'] == 'barista') {
                                                        echo 'selected';
                                                    } ?>>Barista</option>
                                        <option <?php if ($data['level'] == 'kasir') {
                                                        echo 'selected';
                                                    } ?> >Kasir</option>
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

<?php include '../includes/footer.html' ?>