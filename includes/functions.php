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


//define("DEVELOPMENT", TRUE);
function dbConnect(){
$db = new mysqli("$host", "$user", "$password", "$database"); // Sesuaikan dengan konfigurasi server anda.
return $db;
}
?>