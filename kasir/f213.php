<?php
include 'includes/header.html';
include 'includes/kasir__navbar.php';
if (!isset($_GET['page'])) {
    header("Location: index.php");
} 
if(isset($_GET["data"])){ 
$data = $_GET['data'];
    $a = mysqli_query($conn, "SELECT id_pembayaran, CONCAT(MONTHNAME(tanggal_pembayaran), ' ', YEAR(tanggal_pembayaran)) AS `tanggal` FROM `data_pembayaran` GROUP BY `tanggal`,id_pembayaran HAVING `tanggal` LIKE '%$data%'");
    $idvalidator = $_SESSION["id_Pegawai"];
    while($b = mysqli_fetch_array($a)){
        $id_pembayaran = $b['id_pembayaran'];       
        mysqli_query($conn,"UPDATE `data_pembayaran` SET `validasi` = 'divalidasi', `validator` = '$idvalidator' WHERE `data_pembayaran`.`id_pembayaran` = '$id_pembayaran'");
    }
header("location: ?page=laporan");
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-6 col-md-9">
            <h5>Laporan Keuangan</h5>
        </div>
        <div class="col-6 col-md-3">
            <form class="d-flex justify-end" action="" method="GET">
                <input class="form-control me-2" type="text" name="dicari"  placeholder="Masukkan kata kunci..." aria-label="Search" value="<?php echo isset($_GET["dicari"]) ? $_GET["dicari"] : ""; ?>"
                id="datepicker">
                <input type="hidden" name="page" value="laporan">
                <input class="btn btn-dark" type="submit" value="Cari">
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th class="col-md-2">No</th>
            <th class="col-md-5">Bulan Tahun</th>
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
            $data_pegawai = getListValidasiLaporan(Null,Null,$tipe,$cari);
            $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;

            $jumlah_data = count($data_pegawai);
            $total_halaman = ceil($jumlah_data / $batas);

            $databaris = getListValidasiLaporan($halaman_awal,$batas,$tipe,$cari); // ambil seluruh baris data
            $no = $halaman_awal+1;
        foreach ($databaris as $out) { ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $out['Bulan Tahun'] ?></td>
            <td>
                <a href="?page=laporan&data=<?php echo $out['Bulan Tahun'] ?>" class="btn btn-success">Validasi</a>
                <a href="?page=detaillaporan&bulantahun=<?php echo $out['Bulan Tahun'] ?>" class="btn btn-warning">Detail</a>
            </td>
        </tr>
        <?php $no++;} ?>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
              <li class="page-item <?php if($halaman==1) echo "disabled"; ?>"><a class="page-link" <?php if($halaman > 1){ echo "href='?page=laporan&halaman=$previous&dicari=$cari'"; } ?>>Previous</a></li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
               ?>
              <li class="page-item <?php if($halaman==$x) echo "active"; ?>"><a class="page-link" href="?page=laporan&halaman=<?php echo $x."&dicari=".$cari ?>"><?php echo $x; ?></a></li>
              <?php 
              }
               ?>
              <li class="page-item <?php if($halaman>=$total_halaman) echo "disabled"; ?>"><a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=laporan&halaman=$next&dicari=$cari'"; } ?>>Next</a></li>
            </ul>
    </nav>
</div>
<script>
    $( function() {
    $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) { 
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
            }
    });
    $("#datepicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
  } );
</script>
<?php include 'includes/footer.html' ?>