<?php include 'includes/header.html'; ?>
<?php
if (isset($_SESSION["id_Pegawai"])) {
    if ($_SESSION["level"] == "owner") {
        header("Location: ?page=owner");
    } elseif ($_SESSION["level"] == "barista") {
        header("Location: ?page=barista");
    } elseif ($_SESSION["level"] == "kasir") {
        header("Location: ?page=kasir");
    } elseif ($_SESSION["level"] == "pelayan") {
        header("Location: ?page=pelayan");
    }
} else {
    session_destroy();
}
?>
<div class="container">
    <div class="login__card card mx-auto my-auto mt-5">
        <div class=" card-body">
            <h3 class="card-title text-center mb-2 my-3">Login</h3>
            <?php
            include "errorinfo.php";
            ?>
            <form method="POST" action="?page=aksilogin">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class= "input-group mb-3">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <span class="input-group-btn">
                    <button class="btn btn-default reveal" type="button" onclick="myFunction();"><i id="toogleP" class="fa fa-eye-slash"></i>
                    </button>
          </span>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="TblLogin" class="btn btn__search">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script >
    function myFunction() {
      var x = document.getElementById("exampleInputPassword1");
      var toogleP = document.querySelector('#toogleP');
      if (x.type === "password") {
        x.type = "text";
        toogleP.classList.remove('fa-eye-slash');
        toogleP.classList.add('fa-eye');
      } else {
        x.type = "password";
        toogleP.classList.remove('fa-eye');
        toogleP.classList.add('fa-eye-slash');
      }
    } 
</script>

<?php include 'includes/footer.html'; ?>