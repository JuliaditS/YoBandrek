<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php' ?>

<div class="container">
    <h5 class="my-4">Tambah Pesanan</h5>
    <div class="row">
        <div class="col-md-4">
            <form action="" class="form-inline justify-content-center">
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        <label class="col-form-label">Nomor Meja</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" value="2" class="form-control" readonly></input>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        <label class="col-form-label">Keterangan</label>
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>


                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-3">
                        <label class="col-form-label"></label>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Menunggu
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Minum
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Selesai
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btnnew__medium">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th class="col-md-2">Nama Menu</th>
                    <th class="col-md-2">Jenis</th>
                    <th class="col-md-2">Harga</th>
                    <th class="col-md-1">Jumlah</th>
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Bandrek Telur
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Panas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Dingin
                            </label>
                        </div>
                    </td>
                    <td>
                        Rp. 25.000
                    </td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Bandrek Telur Susu
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Panas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Dingin
                            </label>
                        </div>
                    </td>
                    <td>
                        Rp. 25.000
                    </td>
                    <td>2</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.html' ?>