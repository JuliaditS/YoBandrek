<?php
if (!isset($_SESSION["id_Pegawai"]))
    header("Location: index.php?error=2");
if ($_SESSION["level"]!="pelayan") {
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
                    <a class="nav-link" href="?page=listmenup">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=listmeja">Meja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=pemesanan">Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn" data-bs-toggle="modal" data-bs-target="#konfirmasi">Logout</a>

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