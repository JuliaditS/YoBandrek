<?php 
define("DEVELOPMENT", TRUE);
function dbConnect(){
    $db=new mysqli("localhost:3306","root","","yobandrek");// Sesuaikan dengan konfigurasi server anda.
    return $db;
}
?>