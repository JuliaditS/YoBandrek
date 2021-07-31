<?php
if (!isset($_GET['page'])) {
    header("Location: index.php");
} elseif($_SESSION['level']!= 'owner'){
    header("Location: index.php");
}

$no = $_GET['onmenu'];
mysqli_query($conn, "DELETE FROM `data_menu` WHERE `data_menu`.`kode_menu` ='$no' ");
header("location: ?page=validasimenu");
?>