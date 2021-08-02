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
            <form class="d-flex justify-end" action="" method="GET">
                <input class="form-control me-2" type="text" name="dicari" placeholder="Masukkan kata kunci..." aria-label="Search" value="<?php echo isset($_GET["dicari"]) ? $_GET["dicari"] : ""; ?>">
                <input type="hidden" name="page" value="listmenup">
                <input class="btn btn-dark" type="submit" value="Cari">
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-3">Kode</th>
            <th class="col-md-9">Nama Menu</th>
            <th class="col-md-9">Jenis</th>
            <th class="col-md-9">Harga</th>
            <th class="col-md-9">Diskon</th>
            <th class="col-md-9">Stok</th>
        </tr>
        <?php 
        if (!isset($_GET["dicari"])) {
                $tipe = "semua";
                $cari = Null;
            } else {
                $tipe = "cari";
                $cari = $_GET["dicari"];
                if ($cari=="")
                    $tipe = "semua";
            }
            $batas=10;
            $data_pegawai = getListMenu(Null,Null,$tipe,$cari);
            $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;

            $jumlah_data = count($data_pegawai);
            $total_halaman = ceil($jumlah_data / $batas);

            $databaris = getListMenu($halaman_awal,$batas,$tipe,$cari); // ambil seluruh baris data
            $no = $halaman_awal+1;
        foreach ($databaris as $out) { ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $out['nama'];?></td>
            <td><?php echo $out['jenis'];?></td>
            <td><?php echo $out['harga'];?></td>
            <td><?php echo $out['diskon'];?></td>
            <td><?php echo $out['stok'];?></td>
        </tr>
        <?php $no++;} ?>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
              <li class="page-item <?php if($halaman==1) echo "disabled"; ?>"><a class="page-link" <?php if($halaman > 1){ echo "href='?page=listmenup&halaman=$previous&dicari=$cari'"; } ?>>Previous</a></li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
               ?>
              <li class="page-item <?php if($halaman==$x) echo "active"; ?>"><a class="page-link" href="?page=listmenup&halaman=<?php echo $x."&dicari=".$cari ?>"><?php echo $x; ?></a></li>
              <?php 
              }
               ?>
              <li class="page-item <?php if($halaman>=$total_halaman) echo "disabled"; ?>"><a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=listmenup&halaman=$next&dicari=$cari'"; } ?>>Next</a></li>
            </ul>
    </nav>
</div>
<?php include 'includes/footer.html' ?>