<?php
if (!isset($_GET['page'])) {
    header("Location: index.php");
} 
include 'includes/header.html';
include 'includes/owner__navbar.php'; 

$onuser = $_GET['onpegawai'];
$f = mysqli_query($conn, "select * from data_pegawai where id_pegawai='$onuser'");
$ff = mysqli_fetch_array($f);

if($_SERVER["REQUEST_METHOD"] == "POST"){ 

    if($_POST['namapegawai']!=$ff['nama']){
        $nama = $_POST['namapegawai'];
        mysqli_query($conn, "UPDATE `data_pegawai` SET `nama` = '$nama' WHERE `data_pegawai`.`id_Pegawai` = $onuser");
    }
    if($_POST['username']!=$ff['username']){
        $user = $_POST['username'];
        mysqli_query($conn, "UPDATE `data_pegawai` SET `username` = '$user' WHERE `data_pegawai`.`id_Pegawai` = $onuser");
    }
    if(md5($_POST['password'])!=$ff['password']){
        $pass = md5($_POST['password']);
        mysqli_query($conn, "UPDATE `data_pegawai` SET `password` = '$pass' WHERE `data_pegawai`.`id_Pegawai` = $onuser");
    }
    if($_POST['level']!=$ff['level']){
        $level= $_POST['level'];
        mysqli_query($conn, "UPDATE `data_pegawai` SET `level` = '$level' WHERE `data_pegawai`.`id_Pegawai` = $onuser");
    }
    
    header("location: ?page=listpegawai");
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
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Nama</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="namapegawai" value="<?php echo $ff['nama'];?>">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Username</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="<?php echo $ff['username'];?>">
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
                                    <select class="form-select" aria-label="Default select example" name="level">
                                        <option selected>Pilih level</option>
                                        <option <?php if($ff['level']=='owner'){echo "selected";} ?> value="owner">Owner</option>
                                        <option <?php if($ff['level']=='pelayan'){echo "selected";} ?> value="pelayan">Pelayan</option>
                                        <option <?php if($ff['level']=='barista'){echo "selected";} ?> value="barista">Barista</option>
                                        <option <?php if($ff['level']=='kasir'){echo "selected";} ?> value="kasir">Kasir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btnnew__medium ">Submit</button>
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