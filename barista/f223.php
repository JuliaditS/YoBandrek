<?php include 'includes/header.html';
include 'includes/barista__navbar.php';
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-6 col-md-9">
            <h5>List Pemesanan</h5>
        </div>
        <div class="col-6 col-md-3">
            <form class="d-flex justify-end" action="" method="GET">
                <input class="form-control me-2" type="text" name="dicari" placeholder="Masukkan kata kunci..." aria-label="Search" value="<?php echo isset($_GET["dicari"]) ? $_GET["dicari"] : ""; ?>">
                <input type="hidden" name="page" value="listpemesanan">
                <input class="btn btn-dark" type="submit" value="Cari">
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th class="col-md-2">No Pemesanan</th>
            <th class="col-md-5">Status Pesanan</th>
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
            $data_pegawai = getListPemesanan(Null,Null,$tipe,$cari);
            $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;

            $jumlah_data = count($data_pegawai);
            $total_halaman = ceil($jumlah_data / $batas);

            $databaris = getListPemesanan($halaman_awal,$batas,$tipe,$cari); // ambil seluruh baris data
            $no = $halaman_awal+1;
        foreach ($databaris as $out) { ?>
        <tr>
            <td><?php echo $out["no_pemesanan"];?></td>
            <td><?php echo $out["status_pesanan"];?></td>
            <td>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#detail<?php echo $out['no_pemesanan']; ?>">Detail</button>
                <div class="modal fade" id="detail<?php echo $out['no_pemesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">No Pemesanan <?php echo $out['no_pemesanan']; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-1">Kode</th>
                                                        <th class="col-md-2">Nama pesanan</th>
                                                        <th class="col-md-2">Jenis</th>
                                                        <th class="col-md-2">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $databaris = getDetailPemesanan(Null,Null, Null,$out['no_pemesanan']);
                                                    foreach ($databaris as $data) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $data['Kode']; ?></td>
                                                            <td><?php echo $data['Nama Menu']; ?></td>
                                                            <td><?php echo $data['Jenis']; ?></td>
                                                            <td><?php echo $data['Jumlah']; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <form method="POST" action="?page=listpemesanan">
                                                <div class="row">
                                                    <div class=" col-md-6">
                                                        <input type="radio" name="status_pesanan" value="diproses" <?php echo $out['status_pesanan']=="diproses"?'checked':''; ?> checked> Diproses
                                                    </div>
                                                    <div class=" col-md-6">
                                                        <input type="radio" name="status_pesanan" value="disajikan" <?php echo $out['status_pesanan']=="disajikan"?'checked':''; ?>> Disajikan
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            

                                                <input type="submit" name="btnSubmit" class="btn btn__search" data-bs-dismiss="modal" value="Ubah">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </td>
        </tr>
        <?php $no++;} ?>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
              <li class="page-item <?php if($halaman==1) echo "disabled"; ?>"><a class="page-link" <?php if($halaman > 1){ echo "href='?page=listpemesanan&halaman=$previous&dicari=$cari'"; } ?>>Previous</a></li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
               ?>
              <li class="page-item <?php if($halaman==$x) echo "active"; ?>"><a class="page-link" href="?page=listpemesanan&halaman=<?php echo $x."&dicari=".$cari ?>"><?php echo $x; ?></a></li>
              <?php 
              }
               ?>
              <li class="page-item <?php if($halaman>=$total_halaman) echo "disabled"; ?>"><a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=listpemesanan&halaman=$next&dicari=$cari'"; } ?>>Next</a></li>
            </ul>
    </nav>
</div>

<?php include 'includes/footer.html' ?>