<?php 
include 'includes/header.html'; 
include 'includes/pelayan__navbar.php'; 
error_reporting(0);
$batas = 5;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
$previous = $halaman - 1;
$next = $halaman + 1;
$data = mysqli_query($conn,"select * from data_pegawai");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
if(!empty(trim($_POST['cari']))){
    $cari = $_POST['cari'];
$fetch = mysqli_query($conn, "SELECT `data_meja`.* FROM `data_meja` where no_meja like '%$cari%' limit $halaman_awal, $batas");
}else{
$fetch = mysqli_query($conn, "SELECT `data_meja`.* FROM `data_meja` limit $halaman_awal, $batas");
}
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="?page=tambahmeja" class="btn btnnew__medium d-inline">Tambah Meja</a>
                <h5 class="my-3">List Meja</h5>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <form action="?page=listmeja" method="POST" class="d-flex justify-end">
                <input class="form-control me-2" name="cari" type="search" placeholder="Masukkan kata kunci..." aria-label="Search">
                <button class="btn btn__search" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-2">No</th>
            <th class="col-md-2">No Meja</th>
            <th class="col-md-2">Jumlah Kursi</th>
            <th class="col-md-1">Aksi</th>
        </tr>
        <?php
        $no = 0; 
        while($data = mysqli_fetch_array($fetch)){ 
            $no = $no + 1;
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['no_meja'];?></td>
            <td><?php echo $data['jumlah_kursi'];?></td>
            <td>
                <a href="?page=editmeja&onmeja=<?php echo $data['no_meja'];?>" class="btn btn-warning"><i class='bx bx-edit'></i></a>
                <a href="?page=hapusmeja&onmeja=<?php echo $data['no_meja'];?>" class="btn btn-danger"><i class='bx bx-trash'></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" <?php if($halaman > 1){ echo "href='?page=listmeja&halaman=$Previous'"; } ?>>Previous</a></li> 
            <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?page=listmeja&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=listmeja&halaman=$next'"; } ?>>Next</a>
				</li>
        </ul>
    </nav>
</div>
<?php include 'includes/footer.html' ?>