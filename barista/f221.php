<?php include 'includes/header.html';
include 'includes/barista__navbar.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){  
    $status = $_POST['status'];
    $stok   = $_POST['stok'];
    $kode   = $_POST['kode'];
    mysqli_query($conn, "UPDATE `data_menu` SET `status` = '$status', `stok` = '$stok' WHERE `data_menu`.`kode_menu` = '$kode'");
    header("location: ?page=listmenub");
}
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="?page=tambahrekomendasi" class="btn btnnew__medium d-inline">+ Rekomendasi Menu</a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <form class="d-flex justify-end" action="" method="GET">
                <input class="form-control me-2" type="text" name="dicari" placeholder="Masukkan kata kunci..." aria-label="Search" value="<?php echo isset($_GET["dicari"]) ? $_GET["dicari"] : ""; ?>">
                <input type="hidden" name="page" value="listmenub">
                <input class="btn btn-dark" type="submit" value="Cari">
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-1">Kode</th>
            <th class="col-md-2">Nama Menu</th>
            <th class="col-md-1">Stok</th>
            <th class="col-md-2">Keterangan</th>
            <th class="col-md-1">Status</th>
            <th class="col-md-1">Aksi</th>
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
            $data_pegawai = getListValidasiMenu(Null,Null,$tipe,$cari);
            $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;

            $jumlah_data = count($data_pegawai);
            $total_halaman = ceil($jumlah_data / $batas);

            $databaris = getListValidasiMenu($halaman_awal,$batas,$tipe,$cari); // ambil seluruh baris data
            $no = $halaman_awal+1;
        foreach ($databaris as $out) { ?>
        
        <tr>
            <td><?php echo $out["kode_menu"];?></td>
            <td><?php echo $out['nama'];?></td>
            <td>
                <?php 
                if ($out['keterangan']=="divalidasi") {
                    ?>
                    <form action="?page=listmenub" method="POST" class="d-flex justify-end">
                    <input type="hidden" value="<?php echo $out["kode_menu"];?>" name="kode" />
                    <input class="form-control" id="stok<?php echo $out["kode_menu"];?>" onchange="myfunction(this)" onkeyup="myfunction(this)" min="0" type="number" name="stok" value="<?php echo $out['stok'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <?php
                }
                ?>
                
            </td>
            <td>
                <?php echo $out['keterangan'];?>
            </td>
            <td>
                <?php 
                if ($out['keterangan']=="divalidasi") {
                    ?>
                    <select name="status" class="form-control" id="status<?php echo $out["kode_menu"];?>" readonly>
                        <option value="tidak tersedia" <?php echo $out['status']=='tidak tersedia'?"selected":""; ?>>tidak tersedia</option>
                        <option value="tersedia" <?php echo $out['status']=='tersedia'?"selected":""; ?>>tersedia</option>
                    </select>
                    <?php
                }
                ?>
            </td>
            <td>
                <?php 
                if ($out['keterangan']=="divalidasi") {
                    ?>
                    <input type="submit" class="btn btn-warning" value='Ubah' onclick="enabled()">
                    </form>
                    <?php
                }
                ?>
                
            </td>
        </tr>
        
        <?php $no++;} ?>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
              <li class="page-item <?php if($halaman==1) echo "disabled"; ?>"><a class="page-link" <?php if($halaman > 1){ echo "href='?page=listmenub&halaman=$previous&dicari=$cari'"; } ?>>Previous</a></li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
               ?>
              <li class="page-item <?php if($halaman==$x) echo "active"; ?>"><a class="page-link" href="?page=listmenub&halaman=<?php echo $x."&dicari=".$cari ?>"><?php echo $x; ?></a></li>
              <?php 
              }
               ?>
              <li class="page-item <?php if($halaman>=$total_halaman) echo "disabled"; ?>"><a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=listmenub&halaman=$next&dicari=$cari'"; } ?>>Next</a></li>
            </ul>
    </nav>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<script>
    function myfunction (angka){
        var kodemenu = angka.id.substring(4);

        if (angka.value <= 0 ||angka.value == "") {
            angka.value = "0";
            $("#status"+kodemenu).val("tidak tersedia").change();
        } else {
            $("#status"+kodemenu).val("tersedia").change();
        }
    }
    function enabled() {
        $('select').prop('disabled', false);
    }
    $('select').prop('disabled', true);

</script>
<?php include 'includes/footer.html' ?>