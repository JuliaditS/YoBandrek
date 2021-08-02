<?php
include 'includes/header.html';
include 'includes/kasir__navbar.php';
if (!isset($_GET['page'])) {
    header("Location: index.php");
} ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-6 col-md-9">
            <h5>Laporan Keuangan</h5>
        </div>
        <div class="col-6 col-md-3">
            <form class="d-flex justify-end" action="" method="GET">
                <input class="form-control me-2" type="text" name="dicari" placeholder="Masukkan kata kunci..." aria-label="Search" value="<?php echo isset($_GET["dicari"]) ? $_GET["dicari"] : ""; ?>">
                <input type="hidden" name="page" value="detaillaporan">
                <input type="hidden" name="bulantahun" value="<?php echo $_GET['bulantahun']; ?>">
                <input class="btn btn-dark" type="submit" value="Cari">
            </form>
        </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th colspan="7"><?php echo $_GET['bulantahun']; ?></th>
        </tr>
        <tr>
            <th class="col-md-1">No Pemesanan</th>
            <th class="col-md-2">Nama kasir</th>
            <th class="col-md-2">Total harga</th>
            <th class="col-md-1">Pajak</th>
            <th class="col-md-2">Uang Pembayaran</th>
            <th class="col-md-2">Uang Kembalian</th>
            <th class="col-md-2">Tanggal Pembayaran</th>
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
            $data_pegawai = getListDetailLaporan(Null,Null,$tipe,$cari,$_GET['bulantahun']);
            $halaman = (isset($_GET['halaman']))?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;

            $jumlah_data = count($data_pegawai);
            $total_halaman = ceil($jumlah_data / $batas);

            $databaris = getListDetailLaporan($halaman_awal,$batas,$tipe,$cari,$_GET['bulantahun']); // ambil seluruh baris data
            $no = $halaman_awal+1;
        foreach ($databaris as $out) { ?>
        <tr>
            <td><?php echo $out['No Pemesanan']; ?></td>
            <td><?php echo $out['Nama kasir']; ?></td>
            <td><?php echo $out['Total Harga']; ?></td>
            <td><?php echo $out['Pajak']; ?></td>
            <td><?php echo $out['Uang Pembayaran']; ?></td>
            <td><?php echo $out['Uang Kembalian']; ?></td>
            <td><?php echo $out['Tanggal Pembayaran']; ?></td>
        </tr>
        <?php $no++;} ?>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
              <li class="page-item <?php if($halaman==1) echo "disabled"; ?>"><a class="page-link" <?php if($halaman > 1){ echo "href='?page=detaillaporan&bulantahun=".$_GET['bulantahun']."&halaman=$previous&dicari=$cari'"; } ?>>Previous</a></li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
               ?>
              <li class="page-item <?php if($halaman==$x) echo "active"; ?>"><a class="page-link" href="?page=detaillaporan&bulantahun=<?php echo $_GET['bulantahun']; ?>&halaman=<?php echo $x."&dicari=".$cari ?>"><?php echo $x; ?></a></li>
              <?php 
              }
               ?>
              <li class="page-item <?php if($halaman>=$total_halaman) echo "disabled"; ?>"><a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=detaillaporan&bulantahun=".$_GET['bulantahun']."&halaman=$next&dicari=$cari'"; } ?>>Next</a></li>
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