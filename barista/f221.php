<?php include 'includes/header.html'; ?>
<?php include 'includes/barista__navbar.php'; ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="?page=tambahrekomendasi" class="btn btnnew__medium d-inline">+ Rekomendasi Menu</a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <form class="d-flex justify-end">
                <input class="form-control me-2" type="search" placeholder="Masukkan kata kunci..." aria-label="Search">
                <button class="btn btn__search" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-1">Kode</th>
            <th class="col-md-2">Nama Menu</th>
            <th class="col-md-1">Stok</th>
            <th class="col-md-2">Keterangan</th>
            <th class="col-md-1">Status</th>
            <th class="col-md-1">Aksi</th>
        </tr>
        <tr>
            <td>07</td>
            <td>Bandrek Telor</td>
            <td>
                <form class="d-flex justify-end">
                    <input class="form-control" value="1">
                </form>
            </td>
            <td>
                Divalidasi
            </td>
            <td>
                <form class="">
                    <input class="form-control" value="Tersedia">
                </form>
            </td>
            <td>
                <a href="" class="btn btn-warning"><i class='bx bx-edit'></i></a>
            </td>
        </tr>
        <tr>
            <td>08</td>
            <td>Bandrek Ghoib</td>
            <td>
                <!-- <form class="d-flex justify-end">
                    <input class="form-control" value="">
                </form> -->
            </td>
            <td>
                Belum Divalidasi
            </td>
            <td>
                <!-- <form class="">
                    <input class="form-control" value="Tersedia">
                </form> -->
            </td>
            <td>
                <a href="" class="btn btn-outline-success invisible">Ubah</a>
            </td>
        </tr>
        <tr>
            <td>09</td>
            <td>Bandrek Susu</td>
            <td>
                <!-- <form class="d-flex justify-end">
                    <input class="form-control" value="">
                </form> -->
            </td>
            <td>
                Belum Divalidasi
            </td>
            <td>
                <!-- <form class="">
                    <input class="form-control" value="Tersedia">
                </form> -->
            </td>
            <td>
                <a href="" class="btn btn-outline-success invisible">Ubah</a>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Bandrek Kopi</td>
            <td>
                <!-- <form class="d-flex justify-end">
                    <input class="form-control" value="">
                </form> -->
            </td>
            <td>
                Belum Divalidasi
            </td>
            <td>
                <!-- <form class="">
                    <input class="form-control" value="Tersedia">
                </form> -->
            </td>
            <td>
                <a href="" class="btn btn-outline-success invisible">Ubah</a>
            </td>
        </tr>
        <tr>
            <td>11</td>
            <td>Bandrek Telor Susu</td>
            <td>
                <form class="d-flex justify-end">
                    <input class="form-control" value="1">
                </form>
            </td>
            <td>
                Divalidasi
            </td>
            <td>
                <form class="">
                    <input class="form-control" value="Tersedia">
                </form>
            </td>
            <td>
                <a href="" class="btn btn-warning"><i class='bx bx-edit'></i></a>
            </td>
        </tr>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    < Previous</a> </li> <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next ></a>
            </li>
        </ul>
    </nav>
</div>

<?php include 'includes/footer.html' ?>