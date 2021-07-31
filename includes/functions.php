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
?>