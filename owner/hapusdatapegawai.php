<?php 
$user = $_GET['onpegawai'];
mysqli_query($conn, "DELETE FROM `data_pegawai` WHERE `data_pegawai`.`id_Pegawai` = $user");
mysqli_close($conn);
header("location: ?page=listpegawai");
?>