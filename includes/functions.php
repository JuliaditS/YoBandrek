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
            $sql = "SELECT * FROM `data_pemesanan` ORDER BY status_pesanan asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");
        else
            $sql = "SELECT * FROM `data_pemesanan` WHERE no_pemesanan LIKE '%$cari%' ORDER BY status_pesanan asc ".(($halaman_awal==Null&&$batas==Null) ? "" : "limit $halaman_awal, $batas");  
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
?>