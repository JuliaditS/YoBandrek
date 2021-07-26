<?php include 'header.html' ?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light mt-3 ps-2 pe-3  rounded">
        <a class="navbar-brand" href="f200.php">YoBandrek</a>
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
                        <li><a class="dropdown-item" href="f201.php">Kasir</a></li>
                        <li><a class="dropdown-item" href="f201.php">Pelayan</a></li>
                        <li><a class="dropdown-item" href="f201.php ">Barista</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="f204.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="f205.php">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</div>