<?php
session_start();
if (!isset($_SESSION["id_Pegawai"]))
    header("Location: index.php?error=2");
if ($_SESSION["level"]!="kasir") {
    header("Location: index.php?error=2");
}
?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light mt-3 px-2 rounded">
        <a class="navbar-brand" href="#">YoBandrek</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="f211.php">Pembayaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="f213.php">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</div>