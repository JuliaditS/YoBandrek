<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php' ?>
<form action="" method="POST">
<div class="container mt-3">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group" id="tambah" style="display: none;">
            <input type="submit" name="tambah" class="btn btnnew__medium" value="Tambah">
            <i class='bx bx-plus-circle'> </i>
        </div>
        <div class="btn-group mr-2" role="group" aria-label="Second group" id="edit" style="display: none;">
            <input type="submit" name="edit" class="btn btn-warning" value="Edit Pemesanan">
            <i class='bx bx-edit'></i>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row center-align" id="meja">

    </div>

</div>
</form>
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
        if (ini.checked==true) {
            for (var i = 1; i <= document.getElementById('no').value; i++) {
                if (document.getElementById(i).value == ini.value) {
                    document.getElementById(i).checked=true;
                    if (document.getElementById('status'+ini.value).value=="tersedia") {
                        document.getElementById('tambah').style.display="block";
                        document.getElementById('edit').style.display="none";
                        for (var b = 1; b <= document.getElementById('no').value; b++) {
                            if (document.getElementById(b).value!="") {
                                document.getElementById(b).checked=false;
                            } 
                        }
                    } else {
                        document.getElementById('tambah').style.display="none";
                        document.getElementById('edit').style.display="block";
                        
                    }
                } else {
                    if (document.getElementById('status'+ini.value).value=="tersedia") {
                        document.getElementById('tambah').style.display="block";
                        document.getElementById('edit').style.display="none";
                        for (var b = 1; b <= document.getElementById('no').value; b++) {
                            if (document.getElementById(b).value!="") {
                                document.getElementById(b).checked=false;
                            } 
                        }
                    } else {
                        document.getElementById(i).checked=false;
                    }
                    
                }
            }
            
            
        } else {
            for (var i = 1; i <= document.getElementById('no').value; i++) {
                if (document.getElementById(i).value == ini.value) {
                    document.getElementById(i).checked=false;
                    document.getElementById('tambah').style.display="none";
                    document.getElementById('edit').style.display="none";
                }
            }
        }
        
        // for (i = 0; i < ini.length; i++) {
        //     document.getElementById(ini.id).checked = true;

        // }
        // console.log('status'+ini.value);
        
    }
</script>
<?php include 'includes/footer.html' ?>