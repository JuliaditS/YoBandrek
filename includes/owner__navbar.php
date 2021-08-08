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
        <a class="navbar-brand" href="?page=owner">YoBandrek</a>
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
                        <li><a class="dropdown-item" href="?page=listpegawai&level=owner">Owner</a></li>
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
                    <button class="nav-link btn" data-bs-toggle="modal" data-bs-target="#konfirmasi">Logout</button>

                    <div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="konfirmasiModalLabel"><i class="fas fa-question-circle fa-sm"></i> Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin akan logout?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary"><a href="?page=logout" class="text-light text-decoration-none" >Ya</a></button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>