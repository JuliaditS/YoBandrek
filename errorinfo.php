<?php
error_reporting(0);
if ($_GET['error'] == 1) {
    echo '<div class="bg-warning px-2 py-2 rounded text-center mb-3 my-2">Mohon maaf, sedang terjadi masalah server</div>';
} elseif ($_GET['error'] == 2) {
    echo '<div class="bg-warning px-2 py-2 rounded text-center mb-3 my-2">Mohon maaf, tidak dapat memasuki halaman</div>';
} elseif ($_GET['error'] == 3 || $_GET['error'] == 4) {
    echo '<div class="bg-warning px-2 py-2 rounded text-center mb-3 my-2">Mohon maaf, username atau password tidak dapat ditemukan</div>';
} elseif ($_GET['error'] == 5) {
    echo '<div class="bg-warning px-2 py-2 rounded text-center mb-3 my-2">Mohon lengkapi pengisian form tersebut agar data dapat dikirimkan</div>';
} elseif ($_GET['error'] == 6) {
    echo '<div class="bg-warning px-2 py-2 rounded text-center mb-3 my-2">Mohon maaf, sedang terjadi masalah server ketika melakukan pengiriman data</div>';
}
