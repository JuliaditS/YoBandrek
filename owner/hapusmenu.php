<?php 
$kdmenu = $_GET['onmenu'];

mysqli_query($conn,"DELETE FROM `data_menu` WHERE `data_menu`.`kode_menu` = '$kdmenu'");
header("location: ?page=validasimenu");

?>