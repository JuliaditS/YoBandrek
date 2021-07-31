<?php if (!isset($_GET['page'])) {
    header("Location: index.php");
} 
include 'includes/header.html';
include 'includes/owner__navbar.php'; 
error_reporting(0);
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="?page=tambahpegawai" class="btn btnnew__medium d-inline">Tambah Pegawai</a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <form class="d-flex justify-end" action="" method="GET">
                <input class="form-control me-2" type="text" name="dicari" placeholder="Masukkan kata kunci..." aria-label="Search" value="<?php echo isset($_GET["dicari"]) ? $_GET["dicari"] : ""; ?>">
                <input type="hidden" name="level" value="<?php echo isset($_GET["level"]) ? $_GET["level"] : ""; ?>">
                <input type="hidden" name="page" value="listpegawai">
                <input class="btn btn-dark" type="submit" value="Cari">
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-3">Id Pegawai</th>
            <th class="col-md-3">Username</th>
            <th class="col-md-4">Nama</th>
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
            $level = isset($_GET["level"]) ? $_GET["level"] : Null; 
            $batas=10;
            $data_pegawai = getListPegawai(Null,Null,$tipe,$cari,$level);
            $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;

            $jumlah_data = count($data_pegawai);
            $total_halaman = ceil($jumlah_data / $batas);

            $databaris = getListPegawai($halaman_awal,$batas,$tipe,$cari,$level); // ambil seluruh baris data
            $i = $halaman_awal+1;
        foreach ($databaris as $datas) { ?>
        <tr>
            <td><?php echo $datas['id_Pegawai'];?></td>
            <td><?php echo $datas['username'];?></td>
            <td><?php echo $datas['nama'];?></td>
            <td>
                <a href="?page=editpegawai&onpegawai=<?php echo $datas['id_Pegawai'];?>" class="btn btn-warning"><i class='bx bx-edit'></i></a>
                <a href="?page=hapuspegawai&onpegawai=<?php echo $datas['id_Pegawai'];?>&level=<?php echo$datas['level'];?>" class="btn btn-danger"><i class='bx bx-trash'></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
              <li class="page-item <?php if($halaman==1) echo "disabled"; ?>"><a class="page-link" <?php if($halaman > 1){ echo "href='?page=listpegawai&level=$level&halaman=$previous&dicari=$cari'"; } ?>>Previous</a></li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
               ?>
              <li class="page-item <?php if($halaman==$x) echo "active"; ?>"><a class="page-link" href="?page=listpegawai&level=<?php echo $level; ?>&halaman=<?php echo $x."&dicari=".$cari ?>"><?php echo $x; ?></a></li>
              <?php 
              }
               ?>
              <li class="page-item <?php if($halaman>=$total_halaman) echo "disabled"; ?>"><a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=listpegawai&level=$level&halaman=$next&dicari=$cari'"; } ?>>Next</a></li>
            </ul>
    </nav>
</div>



<?php include 'includes/footer.html' ?>