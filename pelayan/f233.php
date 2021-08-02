<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php' ?>

<div class="container mt-3">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group">
            <a href="?page=tambahpemesanan" type="button" class="btn btnnew__medium"> <i class='bx bx-plus-circle'> </i>Tambah</a>
        </div>
        <div class="btn-group mr-2" role="group" aria-label="Second group">
            <a href="?page=editpemesanan" type="button" class="btn btn-warning"><i class='bx bx-edit'></i> Edit Pemesanan</a>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row center-align" id="meja">

    </div>

</div>
<script>
    $(document).ready(function() {
        setInterval(function() {
            loadmeja();
        }, 1000);
        loadmeja();

        function loadmeja() {
            $.ajax({
                url: "pelayan/loadmeja.php",
                success: function(data) {
                    $('#meja').html(data);
                }
            })
        }
    })
</script>
<?php include 'includes/footer.html' ?>