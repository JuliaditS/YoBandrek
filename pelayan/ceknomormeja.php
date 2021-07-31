<?php
error_reporting(0);
include "../includes/functions.php";
$no_mej = $_POST['nomor'];
$query = mysqli_query($conn, "select * from data_meja where no_meja='$no_mej'");
if(mysqli_num_rows($query)==0){
    echo "nomor meja dapat dipakai";
}else{
    $a = mysqli_fetch_array($query);
    echo "nomor meja sudah terpakai";
}
?>