<?php include 'includes/header.html' ?>

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#konfirmasi">
        Konfirmasi
    </button>

    <!-- Modal -->
    <div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Ya</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Informasi
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda berhasil logout
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">ok</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.html' ?>