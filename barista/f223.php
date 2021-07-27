<?php include 'includes/header.html' ?>
<?php include 'includes/barista__navbar.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 col-md-9">
            <h5>List Pemesanan</h5>
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
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th class="col-md-2">No Pemesanan</th>
            <th class="col-md-5">Status Barista</th>
            <th class="col-md-2">Aksi</th>
        </tr>
        <tr>
            <td>127</td>
            <td>Pesanan Selesai</td>
            <td>
                <a href="" class="btn btn-outline-success">Detail</a>
            </td>
        </tr>
        <tr>
            <td>128</td>
            <td>Dalam Antrian</td>
            <td>
                <a href="" class="btn btn-outline-success">Detail</a>
            </td>
        </tr>
        <tr>
            <td>129</td>
            <td>Sedang Dibuat</td>
            <td>
                <a href="" class="btn btn-outline-success">Detail</a>
            </td>
        </tr>
        <tr>
            <td>130</td>
            <td>Pesanan Selesai</td>
            <td>
                <a href="" class="btn btn-outline-success">Detail</a>
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