<?php include 'includes/header.html' ?>

<?php include 'includes/kasir__navbar.html' ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <h5>Status Pembayaran</h5>
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
            <th class="col-md-1">No Pemesanan</th>
            <th class="col-md-3">Status Pelanggan</th>
            <th class="col-md-4">Status Barista</th>
            <th class="col-md-2">Total Harga</th>
            <th class="col-md-2">Aksi</th>
        </tr>
        <tr>
            <td>126</td>
            <td>Selesai Minum</td>
            <td>Pesanan Selesai</td>
            <td>25.000</td>
            <td>
                <a href="f212.php" class="btn btn-outline-success">Bayar</a>
            </td>
        </tr>
        <tr>
            <td>127</td>
            <td>Sedang Minum</td>
            <td>Pesanan Selesai</td>
            <td>25.000</td>
            <td>
                <a href="" class="btn btn-outline-success">Bayar</a>
            </td>
        </tr>
        <tr>
            <td>128</td>
            <td>Menunggu Minuman</td>
            <td>Dalam Antrian</td>
            <td>25.000</td>
            <td>
                <a href="" class="btn btn-outline-success invisible">Bayar</a><!-- pake class invisible buat ngilangin button -->
            </td>
        </tr>
        <tr>
            <td>129</td>
            <td>Menunggu Minuman</td>
            <td>Sedang Dibuat</td>
            <td>25.000</td>
            <td>
                <a href="" class="btn btn-outline-success invisible">Bayar</a>
            </td>
        </tr>
        <tr>
            <td>130</td>
            <td>Sedang Minum</td>
            <td>Pesanan Selesai</td>
            <td>25.000</td>
            <td>
                <a href="" class="btn btn-outline-success">Bayar</a>
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