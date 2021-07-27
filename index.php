<?php
session_start(); //session start cukup satu dipaling atas
// header('Location: ?page=home');
if (isset($_GET['page'])) {
    $page = isset($_GET['page']) ? $_GET['page'] : "";
    $error = isset($_GET['page']) ? $_GET['page'] : "";
    $gambar = isset($_GET['gambar']) ? $_GET['gambar'] : "";
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($page == 'aksilogin'||$error == 1||$error == 2||$error == 3 ||$error == 4) {
        require 'aksilogin.php';
    } elseif ($page == 'owner') {
        require 'owner/f200.php';
    } elseif ($page == 'kasir') {
        require 'kasir/f210.php';
    } elseif ($page == 'barista') {
        require 'barista/f220.php';
    } elseif ($page == 'pelayan') {
        require 'pelayan/f230.php';
    // } elseif ($page == 'aksilogin'||$error == 1||$error == 2||$error == 3) {
    //     require 'login/login.php';
    // } elseif ($page == 'menu') {
    //     require 'login/index-admin.php';
    // } 
    // elseif ($page == 'kategori-admin') {
    //     require 'content/admin/kategori.php';
    // } elseif ($page == 'kategori-tambah') {
    //     require 'content/admin/kategori_simpan.php';
    // } elseif ($page == 'kategori-hapus'&&$id!=null) {
    //     require 'content/admin/kategori_hapus.php';
    // } elseif ($page == 'kategori-update') {
    //     require 'content/admin/kategori_update.php';
    // } 
    // elseif ($page == 'studio-admin') {
    //     require 'content/admin/studio.php';
    // } elseif ($page == 'studio-tambah') {
    //     require 'content/admin/studio_simpan.php';
    // } elseif ($page == 'studio-hapus'&&$id!=null) {
    //     require 'content/admin/studio_hapus.php';
    // } elseif ($page == 'studio-update') {
    //     require 'content/admin/studio_update.php';
    // } 
    // elseif ($page == 'user') {
    //     require 'content/admin/user.php';
    // } elseif ($page == 'user-tambah') {
    //     require 'content/admin/user_simpan.php';
    // } elseif ($page == 'user-hapus'&&$id!=null) {
    //     require 'content/admin/user_hapus.php';
    // } elseif ($page == 'user-update') {
    //     require 'content/admin/user_update.php';
    // } 
    // elseif ($page == 'film') {
    //     require 'content/admin/film.php';
    // } elseif ($page == 'film-tambah') {
    //     require 'content/admin/film_simpan.php';
    // } elseif ($page == 'film-hapus'&&$id!=null&&$gambar!=null) {
    //     require 'content/admin/film_hapus.php';
    // } elseif ($page == 'film-update') {
    //     require 'content/admin/film_update.php';
    } elseif ($page == 'logout') {
        require 'logout.php';
    } else {
        require 'login.php';
    }
} else {
    require 'login.php';
}
?>