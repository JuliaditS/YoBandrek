<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php' ?>

<div class="container mt-3">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group" id="tambah" style="display: none;">
            <a href="?page=tambahpemesanan" type="button" class="btn btnnew__medium"> <i class='bx bx-plus-circle'> </i>Tambah</a>
        </div>
        <div class="btn-group mr-2" role="group" aria-label="Second group" id="edit" style="display: none;">
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
        }, 10000000);

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
    function myfunction(ini){
        var test =document.getElementsByName("nomeja");
        var i;
        for (i = 1; i < test.length; i++) {
            
            if (test[i].id==ini.id) {
                test.checked = true;
                console.log(test[i].id);
            }

        }
        // console.log(i);
        if (document.getElementById('status'+ini.id).value=="tersedia") {
            document.getElementById('tambah').style.display="block";
            document.getElementById('edit').style.display="none";
        } else {
            document.getElementById('tambah').style.display="none";
            document.getElementById('edit').style.display="block";
        }
    }
</script>
<?php include 'includes/footer.html' ?>