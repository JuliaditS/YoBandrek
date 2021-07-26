<?php include 'includes/header.html' ?>

<?php include 'includes/owner__navbar.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 col-md-9">
            <h5>Pengajuan menu dari barista</h5>
        </div>
        <div class="col-6 col-md-3">
            <form class="d-flex justify-end">
                <input class="form-control me-2" type="search" placeholder="Masukkan kata kunci..." aria-label="Search">
                <button class="btn btn__search" type="submit">Cari</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-3">Kode</th>
            <th class="col-md-3">Nama Menu</th>
            <th class="col-md-2">Harga</th>
            <th class="col-md-2">Diskon</th>
            <th class="col-md-2">Aksi</th>
        </tr>
        <tr>
            <td>123</td>
            <td>Bandrek Telor</td>
            <td>
                <form class="d-flex justify-end">
                    <input class="form-control" value="10000">
                </form>
            </td>
            <td>
                <form class="d-flex justify-end">
                    <input class="form-control">
                </form>
            </td>
            <td>
                <a href="" class="btn btn-success">Validasi</a>
                <a href="" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <tr>
            <td>124</td>
            <td>Bandrek Ghoib</td>
            <td>
                <form class="d-flex justify-end">
                    <input class="form-control" value="10000">
                </form>
            </td>
            <td>
                <form class="d-flex justify-end">
                    <input class="form-control">
                </form>
            </td>
            <td>
                <a href="" class="btn btn-success">Validasi</a>
                <a href="" class="btn btn-danger">Delete</a>
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