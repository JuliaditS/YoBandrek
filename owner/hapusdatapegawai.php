<?php 
$user = $_GET['onpegawai'];
$level = $_GET['level'];
mysqli_query($conn, "DELETE FROM `data_pegawai` WHERE `data_pegawai`.`id_Pegawai` = $user");
mysqli_close($conn);
Header("location: ?page=listpegawai&level=".$level);
?>