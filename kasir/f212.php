<?php include 'includes/header.html' ?>

<?php include 'includes/kasir__navbar.php' ?>

<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container mt-3">
            <div class="tbhdata__search">
                <h5 class="mt-4 mb-5">Pembayaran</h5>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-form">
                        <form action="" class="form-inline justify-content-center">
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">No Pemesanan</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="126" class="form-control" disabled></input>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Total Pemesanan</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="Rp. 25.000" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Diskon</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="0" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Pajak</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="Rp. 2.500" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Total Bayar</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="Rp. 27.500" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Uang Pembayaran</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Rp." class="form-control" required>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label">Uang Kembalian</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Rp." value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btnnew__medium">Bayar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.html' ?>