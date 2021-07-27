<?php include 'includes/header.html'; ?>
<?php include 'includes/pelayan__navbar.php'; ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="?page=tambahmeja" class="btn btnnew__medium d-inline">Tambah Meja</a>
                <h5 class="my-3">List Meja</h5>
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
            <th class="col-md-2">No</th>
            <th class="col-md-2">No Meja</th>
            <th class="col-md-2">Jumlah Kursi</th>
            <th class="col-md-1">Aksi</th>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>15</td>
            <td>
                <a href="f235.php" class="btn btn-warning"><i class='bx bx-edit'></i></a>
                <a href="" class="btn btn-danger"><i class='bx bx-trash'></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>3</td>
            <td>5</td>
            <td>
                <a href="f235.php" class="btn btn-warning"><i class='bx bx-edit'></i></a>
                <a href="" class="btn btn-danger"><i class='bx bx-trash'></i></a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>
                <a href="f235.php" class="btn btn-warning"><i class='bx bx-edit'></i></a>
                <a href="" class="btn btn-danger"><i class='bx bx-trash'></i></a>
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