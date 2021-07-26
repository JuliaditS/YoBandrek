<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.html' ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="#" class="btn btnnew__medium d-inline">Cetak Menu</a>
                <h5 class="my-3">List Menu</h5>
            </div>
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
            <th class="col-md-9">Nama Menu</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Bandrek Kopi</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bandrek Telur</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Bandrek Telur Susu</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Bandrek Original</td>
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