<?php 
include 'includes/header.html';
include 'includes/owner__navbar.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){  
    if($_POST['status']=='Validasi'){
        $kode  = $_POST['kode'];
        $harga = $_POST['harga'];
        $diskon= $_POST['diskon'];
        mysqli_query($conn, "UPDATE `data_menu` SET `harga` = '$harga', `keterangan` = 'divalidasi', `diskon` = '$diskon' WHERE `data_menu`.`kode_menu` = '$kode'");
        header("location: ?page=validasimenu");
    }else{
        $kode  = $_POST['kode'];
        $harga = $_POST['harga'];
        $diskon= $_POST['diskon'];
        mysqli_query($conn, "UPDATE `data_menu` SET `harga` = '$harga', `diskon` = '$diskon' WHERE `data_menu`.`kode_menu` = '$kode'");
        header("location: ?page=validasimenu");
    }
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 col-md-9">
            <h5>Pengajuan menu dari barista</h5>
        </div>
        <div class="col-6 col-md-3">
            <form class="d-flex justify-end" action="" method="GET">
                <input class="form-control me-2" type="text" name="dicari" placeholder="Masukkan kata kunci..." aria-label="Search" value="<?php echo isset($_GET["dicari"]) ? $_GET["dicari"] : ""; ?>">
                <input type="hidden" name="page" value="validasimenu">
                <input class="btn btn-dark" type="submit" value="Cari">
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-3">Kode</th>
            <th class="col-md-3">Nama Menu</th>
            <th class="col-md-2">Harga</th>
            <th class="col-md-2">Diskon</th>
            <th class="col-md-2">Aksi</th>
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
            <td><?php echo $out["kode_menu"];?></td>
            <td><?php echo $out['nama'];?></td>
            <td>                
                <form class="d-flex justify-end" method="POST">
                <input type="hidden" value="<?php echo $out["kode_menu"];?>" name="kode" />
                    <input class="form-control" name="harga" value="<?php echo $out['harga'];?>">
            </td>
            <td>
                    <input class="form-control" name="diskon" value="<?php echo $out['diskon'];?>">
                
            </td>
            <td>
                <input type="submit" name="status" value="<?php echo $out['keterangan']=="divalidasi"?"Update":"Validasi"; ?>" class="btn btn-success">
                <a href="?page=hapusmenu&onmenu=<?php echo $out["kode_menu"];?>" class="btn btn-danger">Delete</a>
                </form>
            </td>
        </tr><?php $no++;} ?>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
              <li class="page-item <?php if($halaman==1) echo "disabled"; ?>"><a class="page-link" <?php if($halaman > 1){ echo "href='?page=validasimenu&halaman=$previous&dicari=$cari'"; } ?>>Previous</a></li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
               ?>
              <li class="page-item <?php if($halaman==$x) echo "active"; ?>"><a class="page-link" href="?page=validasimenu&halaman=<?php echo $x."&dicari=".$cari ?>"><?php echo $x; ?></a></li>
              <?php 
              }
               ?>
              <li class="page-item <?php if($halaman>=$total_halaman) echo "disabled"; ?>"><a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=validasimenu&halaman=$next&dicari=$cari'"; } ?>>Next</a></li>
            </ul>
    </nav>
</div>

<?php include 'includes/footer.html' ?>