<?php 
session_start();
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "yobandrek";
$conn = mysqli_connect($host, $user, $password, $database);
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


define("DEVELOPMENT", TRUE);
function dbConnect(){
    $db = new mysqli("localhost", "root", "", "yobandrek"); // Sesuaikan dengan konfigurasi server anda.
    return $db;
}

function getListPegawai($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null, $level="owner")
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT * FROM data_pegawai WHERE level = '$level' ORDER BY nama ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT * FROM data_pegawai WHERE level = '$level' AND (username like '%$cari%' OR nama like '%$cari%') ORDER BY nama ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}
function getListMenu($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT * FROM data_menu ORDER BY nama ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT * FROM data_menu WHERE jenis like '%$cari%' OR nama like '%$cari%' OR harga like '%$cari%' ORDER BY nama ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}
function getListMeja($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT * FROM data_meja ORDER BY no_meja ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT * FROM data_meja WHERE no_meja like '%$cari%' OR jumlah_kursi like '%$cari%' ORDER BY no_meja ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}
function getListValidasiMenu($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT * FROM data_menu ORDER BY keterangan asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT * FROM data_menu WHERE nama like '%$cari%' ORDER BY keterangan asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListLaporanKeuangan($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT Concat(MONTHNAME(data_pembayaran.tanggal_pembayaran),' ',YEAR(data_pembayaran.tanggal_pembayaran)) AS `Bulan Tahun`, COUNT(data_pembayaran.id_pembayaran) AS `Jumlah Transaksi`, SUM(`total_harga`) AS `Uang Masuk` FROM `data_pembayaran` WHERE data_pembayaran.validasi='divalidasi' GROUP BY `Bulan Tahun` ORDER BY `Bulan Tahun` DESC ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT Concat(MONTHNAME(data_pembayaran.tanggal_pembayaran),' ',YEAR(data_pembayaran.tanggal_pembayaran)) AS `Bulan Tahun`, COUNT(data_pembayaran.id_pembayaran) AS `Jumlah Transaksi`, SUM(`total_harga`) AS `Uang Masuk` FROM `data_pembayaran` WHERE data_pembayaran.validasi='divalidasi' GROUP BY `Bulan Tahun` HAVING `Bulan Tahun` LIKE '%$cari%' ORDER BY `Bulan Tahun` DESC ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}
function getListPemesanan($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT * FROM `data_pemesanan` WHERE no_pemesanan NOT IN (SELECT no_pemesanan FROM `data_pembayaran`) ORDER BY status_pesanan asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT * FROM `data_pemesanan` WHERE no_pemesanan NOT IN (SELECT no_pemesanan FROM `data_pembayaran`) AND (no_pemesanan LIKE '%$cari%') ORDER BY status_pesanan asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}
function getDetailPemesanan($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $sql = "SELECT detail_pemesanan.kode_menu AS `Kode`, data_menu.nama AS `Nama Menu`, data_menu.jenis AS `Jenis`, detail_pemesanan.jumlah AS `Jumlah` FROM `detail_pemesanan` JOIN data_menu ON detail_pemesanan.kode_menu=data_menu.kode_menu WHERE detail_pemesanan.no_pemesanan = $cari ORDER BY detail_pemesanan.kode_menu ASC ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}
function getlistPembayaran($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT data_pemesanan.no_pemesanan AS `No Pemesanan`, data_pemesanan.status_pesanan AS `Status Pesanan`, SUM(data_menu.harga*detail_pemesanan.jumlah) AS `Total Harga` FROM data_pemesanan JOIN detail_pemesanan ON data_pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan JOIN data_menu ON data_menu.kode_menu=detail_pemesanan.kode_menu WHERE data_pemesanan.no_pemesanan NOT IN (SELECT no_pemesanan FROM data_pembayaran) GROUP BY `No Pemesanan` ORDER by `Status Pesanan` desc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT data_pemesanan.no_pemesanan AS `No Pemesanan`, data_pemesanan.status_pesanan AS `Status Pesanan`, SUM(data_menu.harga*detail_pemesanan.jumlah) AS `Total Harga` FROM data_pemesanan JOIN detail_pemesanan ON data_pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan JOIN data_menu ON data_menu.kode_menu=detail_pemesanan.kode_menu WHERE data_pemesanan.no_pemesanan NOT IN (SELECT no_pemesanan FROM data_pembayaran) GROUP BY `No Pemesanan` HAVING `No Pemesanan` LIKE '%$cari%' ORDER by `Status Pesanan` desc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListValidasiLaporan($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT Concat(MONTHNAME(data_pembayaran.tanggal_pembayaran), ' ', YEAR(data_pembayaran.tanggal_pembayaran)) AS `Bulan Tahun` FROM `data_pembayaran` WHERE data_pembayaran.validasi = 'blm divalidasi' GROUP BY `Bulan Tahun` ORDER BY `Bulan Tahun` asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT Concat(MONTHNAME(data_pembayaran.tanggal_pembayaran), ' ', YEAR(data_pembayaran.tanggal_pembayaran)) AS `Bulan Tahun` FROM `data_pembayaran` WHERE data_pembayaran.validasi = 'blm divalidasi' GROUP BY `Bulan Tahun` HAVING `Bulan Tahun` LIKE '%$cari%' ORDER BY `Bulan Tahun` asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

function getListDetailLaporan($halaman_awal=Null, $batas=Null, $tipe="semua", $cari=Null, $bulantahun=Null)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if ($tipe=="semua")
            $sql = "SELECT data_pembayaran.no_pemesanan AS `No Pemesanan`, data_pegawai.nama AS `Nama kasir`, data_pembayaran.total_harga AS `Total Harga`, data_pembayaran.pajak AS `Pajak`, data_pembayaran.uang_pembayaran AS `Uang Pembayaran`, data_pembayaran.uang_kembalian AS `Uang Kembalian`,data_pembayaran.tanggal_pembayaran AS `Tanggal Pembayaran` FROM data_pembayaran JOIN data_pegawai ON data_pembayaran.id_kasir=data_pegawai.id_Pegawai WHERE concat(MONTHNAME(data_pembayaran.tanggal_pembayaran), ' ',YEAR(data_pembayaran.tanggal_pembayaran)) LIKE '%$bulantahun%' ORDER BY `No Pemesanan` asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT data_pembayaran.no_pemesanan AS `No Pemesanan`, data_pegawai.nama AS `Nama kasir`, data_pembayaran.total_harga AS `Total Harga`, data_pembayaran.pajak AS `Pajak`, data_pembayaran.uang_pembayaran AS `Uang Pembayaran`, data_pembayaran.uang_kembalian AS `Uang Kembalian`,data_pembayaran.tanggal_pembayaran AS `Tanggal Pembayaran` FROM data_pembayaran JOIN data_pegawai ON data_pembayaran.id_kasir=data_pegawai.id_Pegawai WHERE concat(MONTHNAME(data_pembayaran.tanggal_pembayaran), ' ',YEAR(data_pembayaran.tanggal_pembayaran)) LIKE '%$bulantahun%' AND (`No Pemesanan` LIKE '%$cari%' OR `Nama Kasir` LIKE '%$cari%') ORDER BY `No Pemesanan` asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
        $res = $db->query($sql);
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}
?>