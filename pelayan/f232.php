<?php
include 'includes/header.html';
include 'includes/pelayan__navbar.php';
error_reporting(0);
$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;
$data = mysqli_query($conn, "select * from data_pegawai");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
if (!empty(trim($_POST['cari']))) {
    $cari = $_POST['cari'];
    $fetch = mysqli_query($conn, "SELECT `data_meja`.* FROM `data_meja` where no_meja like '%$cari%' limit $halaman_awal, $batas");
} else {
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
            <form class="d-flex justify-end" action="" method="GET">
                <input class="form-control me-2" type="text" name="dicari" placeholder="Masukkan kata kunci..." aria-label="Search" value="<?php echo isset($_GET["dicari"]) ? $_GET["dicari"] : ""; ?>">
                <input type="hidden" name="page" value="listmeja">
                <input class="btn btn-dark" type="submit" value="Cari">
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
        if (!isset($_GET["dicari"])) {
            $tipe = "semua";
            $cari = Null;
        } else {
            $tipe = "cari";
            $cari = $_GET["dicari"];
            if ($cari == "")
                $tipe = "semua";
        }
        $batas = 10;
        $data_pegawai = getListMeja(Null, Null, $tipe, $cari);
        $halaman = (isset($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
        $previous = $halaman - 1;
        $next = $halaman + 1;

        $jumlah_data = count($data_pegawai);
        $total_halaman = ceil($jumlah_data / $batas);

        $databaris = getListMeja($halaman_awal, $batas, $tipe, $cari); // ambil seluruh baris data
        $no = $halaman_awal + 1;
        foreach ($databaris as $data) { ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['no_meja']; ?></td>
                <td><?php echo $data['jumlah_kursi']; ?></td>
                <td>
                    <a href="?page=editmeja&onmeja=<?php echo $data['no_meja']; ?>" class="btn btn-warning"><i class='bx bx-edit'></i></a>
                    <a data-bs-toggle="modal" data-bs-target="#konfirmasi<?= $data['no_meja']; ?>"  class="btn btn-danger"><i class='bx bx-trash'></i></a>
                </td>
                <div class="modal fade" id="konfirmasi<?= $data['no_meja']; ?>" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="konfirmasiModalLabel"><i class="fas fa-question-circle fa-sm"></i> Konfirmasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus meja ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"><a href="?page=hapusmeja&onmeja=<?php echo $data['no_meja']; ?>" class="text-light text-decoration-none" >Ya</a></button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                        </div>
                    </div>
                </div>
            </div>
            </tr>
        <?php $no++;
        } ?>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($halaman == 1) echo "disabled"; ?>"><a class="page-link" <?php if ($halaman > 1) {
                                                                                                        echo "href='?page=listmeja&halaman=$previous&dicari=$cari'";
                                                                                                    } ?>>Previous</a></li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
                <li class="page-item <?php if ($halaman == $x) echo "active"; ?>"><a class="page-link" href="?page=listmeja&halaman=<?php echo $x . "&dicari=" . $cari ?>"><?php echo $x; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item <?php if ($halaman >= $total_halaman) echo "disabled"; ?>"><a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                                                                    echo "href='?page=listmeja&halaman=$next&dicari=$cari'";
                                                                                                                } ?>>Next</a></li>
        </ul>
    </nav>
</div>
<?php include 'includes/footer.html' ?>