<?php
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
$fetch = mysqli_query($conn, "select * from data_menu where keterangan='divalidasi' and nama like'%$cari%' OR kode_menu like '%$cari%' limit $halaman_awal, $batas");    
}else{
    $fetch = mysqli_query($conn, "select * from data_menu where keterangan='divalidasi' limit $halaman_awal, $batas");    
}
include 'includes/header.html';
include 'includes/pelayan__navbar.php'; 
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="#" class="btn btnnew__medium d-inline">Cetak Menu</a>
                <h5 class="my-3">List Menu</h5>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <form action="?page=listmenup" method="post"class="d-flex justify-end">
                <input class="form-control me-2" name="cari" type="search" placeholder="Masukkan kata kunci..." aria-label="Search">
                <button class="btn btn__search" type="submit">Cari</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-3">Kode</th>
            <th class="col-md-9">Nama Menu</th>
        </tr>
        <?php 
        $no = 0;
        while($out = mysqli_fetch_array($fetch)){
        $no = $no + 1;
            ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $out['nama'];?></td>
        </tr>
        <?php } ?>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" <?php if($halaman > 1){ echo "href='?page=listmenup&halaman=$Previous'"; } ?>>Previous</a></li> 
            <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?page=listmenup&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=listmenup&halaman=$next'"; } ?>>Next</a>
				</li>
        </ul>
    </nav>
</div>
<?php include 'includes/footer.html' ?>