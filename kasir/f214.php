<?php include 'includes/header.html' ?>

<?php include 'includes/kasir__navbar.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 col-md-9">
            <h5>Laporan Keuangan</h5>
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
            <th colspan="7">Januari</th>
        </tr>
        <tr>
            <th class="col-md-1">No Pemesanan</th>
            <th class="col-md-2">Nama kasir</th>
            <th class="col-md-2">Total harga</th>
            <th class="col-md-1">Pajak</th>
            <th class="col-md-2">Uang Pembayaran</th>
            <th class="col-md-2">Uang Kembalian</th>
            <th class="col-md-2">Tanggal Pembayaran</th>
        </tr>
        <tr>
            <td>126</td>
            <td>Sidiq Sanjaya</td>
            <td>Rp. 25.000</td>
            <td>Rp. 2.500</td>
            <td>Rp. 50.000</td>
            <td>Rp. 22.500</td>
            <td>07 Januari 2021, 19.00</td>
        </tr>
        <tr>
            <td>127</td>
            <td>Ade Kurniawan</td>
            <td>Rp. 32.000</td>
            <td>Rp. 3.200</td>
            <td>Rp. 50.000</td>
            <td>Rp. 15.800</td>
            <td>07 Januari 2021, 20.31</td>
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