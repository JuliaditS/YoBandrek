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
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="TblLogin" class="btn btn__search">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.html'; ?>