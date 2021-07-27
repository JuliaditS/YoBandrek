<?php
error_reporting(0);
if($_GET['error']==1){
    echo '<h6 class="card-info text-center mb-5 my-3">mohon maaf, sedang terjadi masalah server</h6>';
}elseif($_GET['error']==2){
    echo '<h6 class="card-info text-center mb-5 my-3">mohon maaf, tidak dapat memasuki halaman</h6>';
}elseif($_GET['error']==3 && 4){
    echo '<h6 class="card-info text-center mb-5 my-3">mohon maaf, username tidak dapat ditemukan</h6>';
}
?>