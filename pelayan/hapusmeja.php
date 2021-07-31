<?php
error_reporting(0);
include "../includes/functions.php";
$on = $_GET['onmeja'];
mysqli_query($conn, "DELETE FROM `data_meja` WHERE `data_meja`.`no_meja` = '$on'");
mysqli_close($conn);
header("location: ?page=listmeja");

?>