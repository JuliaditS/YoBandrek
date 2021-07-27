<?php include 'includes/header.html' ?>
<?php include 'includes/owner__navbar.php' ?>
<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "yobandrek");
    $data = mysqli_query($koneksi,"SELECT* FROM data_pegawai");
 ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="f202.php" class="btn btnnew__medium d-inline">Tambah Pegawai</a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <form class="d-flex justify-end">
                <input class="form-control me-2" type="search" placeholder="Masukkan kata kunci ..." aria-label="Search">
                <button class="btn btn__search" type="submit">Cari</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <table class="table table-striped table-hover">
        <tr>
            <th class="col-md-3">Id Pegawai</th>
            <th class="col-md-3">Username</th>
            <th class="col-md-4">Nama</th>
            <th class="col-md-2">Aksi</th>
        </tr>
        <?php 
        foreach($data as $dataPegawai){ ?>
        <tr>
            <td><?= $dataPegawai['id_Pegawai']; ?></td>
            <td><?= $dataPegawai['username']; ?></td>
            <td><?= $dataPegawai['nama']; ?></td>
            <td>
                <a href="f203.php?id_Pegawai=<?php echo $dataPegawai["id_Pegawai"]; ?>" class="btn btn-warning"><i class='bx bx-edit'></i></a>
                <a href="aksiHapus.php?id_Pegawai=<?php echo $dataPegawai["id_Pegawai"]; ?>" onclick="return confirm('Yakin?')" class="btn btn-danger"><i class='bx bx-trash'></i></a>
            </td>
        </tr>
        <?php } ?>
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