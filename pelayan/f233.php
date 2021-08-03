<?php include 'includes/header.html' ?>
<?php include 'includes/pelayan__navbar.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['tambah'])){
        echo "a";
        var_dump($_POST['nomeja']);
    }elseif(isset($_POST['edit'])){
        echo "b";
        var_dump($_POST['nopem']);
        var_dump($_POST['nomeja']);
    }
}

?>
<form action="?page=pemesanan" method="POST">
<div class="container mt-3">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group" id="tambah" style="display: none;">
            <button type="submit" name="tambah" class="btn btnnew__medium" value="Tambah">Tambah<i class='bx bx-plus-circle'> </i></button>
        </div>
        <div class="btn-group mr-2 " role="group" aria-label="Second group" id="edit" style="display: none;">
            <button type="submit" name="edit" class="btn btn-warning" value="Edit Pemesanan">Edit Pemesanan<i class='bx bx-edit'></i></button>
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
            document.getElementById('nomeja'+ini.id).disabled=false;
            for (var i = 1; i <= document.getElementById('no').value; i++) {
                if (document.getElementById(i).value == ini.value) {
                    
                    if (document.getElementById('status'+ini.value).value=="tersedia") {
                        document.getElementById('tambah').style.display="block";
                        document.getElementById('edit').style.display="none";
                        for (var b = 1; b <= document.getElementById('no').value; b++) {
                            if (document.getElementById(b).value!="") {
                                document.getElementById(b).checked=false;
                                document.getElementById('nomeja'+b).disabled=true;
                                
                            } 
                        }
                    } else {
                        document.getElementById('nomeja'+i).disabled=false;
                        document.getElementById(i).checked=true;
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
                                document.getElementById('nomeja'+b).disabled=true;
                            } 
                        }
                    } else {
                        document.getElementById(i).checked=false;
                        document.getElementById('nomeja'+i).disabled=true;
                    }
                    
                }
            }
            
            
        } else {
            for (var i = 1; i <= document.getElementById('no').value; i++) {
                if (document.getElementById(i).value == ini.value) {
                    document.getElementById('nomeja'+i).disabled=true;
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