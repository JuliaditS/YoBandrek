<?php  
 require "includes/functions.php";
// if(isset($_SESSION["id_Pegawai"])){
//     header("Location: index-admin.php");
// } else
// session_destroy();
?>
<?php

if (isset($_GET['page'])) {
    $page = isset($_GET['page']) ? $_GET['page'] : "";
    $error = isset($_GET['page']) ? $_GET['page'] : "";
    $gambar = isset($_GET['gambar']) ? $_GET['gambar'] : "";
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($page == 'aksilogin'||$error == 1||$error == 2||$error == 3 ||$error == 4) {
        require 'aksilogin.php';
    
    //index owner
    } elseif ($page == 'owner') {
        require 'owner/f200.php';
    } elseif ($page == 'listpegawai') {
        require 'owner/f201.php';
    } elseif ($page == 'tambahpegawai') {
        require 'owner/f202.php';
    } elseif ($page == 'editpegawai') {
        require 'owner/f203.php';
    }elseif ($page == 'hapuspegawai') {
        require 'owner/hapusdatapegawai.php';
    } elseif ($page == 'validasimenu') {
        require 'owner/f204.php';
    }elseif ($page == 'hapusmenu') {
        require 'owner/hapusmenu.php';
    } elseif ($page == 'laporankeuangan') {
        require 'owner/f205.php';
    

    //index kasir    
    } elseif ($page == 'kasir') {
        require 'kasir/f210.php';
    } elseif ($page == 'listdatabayar') {
        require 'kasir/f211.php';
    } elseif ($page == 'pembayaran') {
        require 'kasir/f212.php';
    } elseif ($page == 'laporan') {
        require 'kasir/f213.php';
    } elseif ($page == 'detaillaporan') {
        require 'kasir/f214.php';
    

    //index barista
    } elseif ($page == 'barista') {
        require 'barista/f220.php';
    } elseif ($page == 'listmenub') {
        require 'barista/f221.php';
    } elseif ($page == 'tambahrekomendasi') {
        require 'barista/f222.php';
    } elseif ($page == 'listpemesanan') {
        require 'barista/f223.php';
          

    //index pelayan
    } elseif ($page == 'pelayan') {
        require 'pelayan/f230.php';
    } elseif ($page == 'listmenup') {
        require 'pelayan/f231.php';
    } elseif ($page == 'listmeja') {
        require 'pelayan/f232.php';
    } elseif ($page == 'pemesanan') {
        require 'pelayan/f233.php';
    } elseif ($page == 'tambahmeja') {
        require 'pelayan/f234.php';
    } elseif ($page == 'editmeja') {
        require 'pelayan/f235.php';
    }elseif ($page == 'hapusmeja') {
        require 'pelayan/hapusmeja.php';
    } elseif ($page == 'tambahpemesanan') {
        require 'pelayan/f326.php';
    } elseif ($page == 'editpemesanan') {
        require 'pelayan/f237.php';
    
    
    
    
    } elseif ($page == 'logout') {
        require 'logout.php';
    } else {
        require 'login.php';
    }
} else {
    require 'login.php';
}
?>