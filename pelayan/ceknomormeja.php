<?php
error_reporting(0);
include "../includes/functions.php";
$no_mej = $_POST['nomor'];
$query = mysqli_query($conn, "select * from data_meja where no_meja='$no_mej'");
if(mysqli_num_rows($query)==0){
    echo "<b style='color:green;'>nomor meja dapat dipakai</b>";
}else{
    $a = mysqli_fetch_array($query);
    echo "<b style='color:red;'>nomor meja sudah ada</b>";
}
?>