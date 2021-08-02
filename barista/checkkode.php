<?php
error_reporting(0);
include "../includes/functions.php";
$kod_men = $_POST['kodemenu'];
$query = mysqli_query($conn, "select * from data_menu where kode_menu='$kod_men'");
if(mysqli_num_rows($query)==0){
    echo "kode menu dapat dipakai";
}else{
    $a = mysqli_fetch_array($query);
    echo "kode menu sudah terpakai di kode menu ".$a['nama'];
}
?>