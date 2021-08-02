<?php 
    include 'includes/functions.php';

    //BELUM ADA PANGGIL KONEKSI 

    $id_Pegawai = $_GET["id_Pegawai"];
    $hapus = mysqli_query($koneksi,"DELETE FROM data_pegawai WHERE id_Pegawai=$id_Pegawai");

    if($hapus){
        echo "
        <script>
            alert('data berhasil Hapus');
            document.location.href = 'f201.php';
        </script>";
        
    } else {
       echo "
        <script>
            alert('data gagal Hapus');
            document.location.href = 'f201.php';
        </script>";
       
    }
 ?>