<?php include 'header.html' ?>
<?php
if (!isset($_SESSION["id_Pegawai"]))
    header("Location: index.php?error=2");
if ($_SESSION["level"]!="owner") {
    header("Location: index.php?error=2");
}


?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light mt-3 ps-2 pe-3  rounded">
        <a class="navbar-brand" href="?page">YoBandrek</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pegawai
                    </a>
                    <ul class="navbar__dropdownowner dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="?page=listpegawai&level=kasir">Kasir</a></li>
                        <li><a class="dropdown-item" href="?page=listpegawai&level=pelayan">Pelayan</a></li>
                        <li><a class="dropdown-item" href="?page=listpegawai&level=barista">Barista</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=validasimenu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=laporankeuangan">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</div>