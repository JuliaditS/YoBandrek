<?php
error_reporting(0);
if($_GET['error']==1){
    echo '<h6 class="card-info text-center mb-5 my-3">mohon maaf, sedang terjadi masalah server</h6>';
}elseif($_GET['error']==2){
    echo '<h6 class="card-info text-center mb-5 my-3">mohon maaf, tidak dapat memasuki halaman</h6>';
}elseif($_GET['error']==3 || $_GET['error']==4){
    echo '<h6 class="card-info text-center mb-5 my-3">mohon maaf, username atau password tidak dapat ditemukan</h6>';
}elseif($_GET['error']==5){
    echo '<h6 class="card-info text-center mb-5 my-3">mohon lengkapi pengisian form tersebut agar data dapat dikirimkan</h6>';
}elseif($_GET['error']==6){
    echo '<h6 class="card-info text-center mb-5 my-3">mohon maaf, sedang terjadi masalah server ketika melakukan pengiriman data</h6>';
}
?>