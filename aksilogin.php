<?php 

if($conn === false){
	header("Location: ?page=&&error=1");
} elseif (!isset($_POST["TblLogin"])) {
	header("Location: ?page=&&error=2");
} else{
	$username=$_POST["username"];
	$sql= mysqli_query($conn, "SELECT * FROM data_pegawai WHERE username='$username'");
	if (mysqli_num_rows($sql)==0) {
		header("Location: ?page=&&error=3");
	} else{
		$password=$_POST["password"];
		$sql1=mysqli_query($conn, "SELECT * FROM data_pegawai WHERE username='$username' and password=md5('$password')");
		if (mysqli_num_rows($sql1)==0) {
			header("Location: ?page=&&error=4");
		} else {
			$data=mysqli_fetch_array($sql1);
			session_start();
			$_SESSION["id_Pegawai"]=$data["id_Pegawai"];
			$_SESSION["username"]=$data["username"];
			$_SESSION["password"]=$data["password"];
			$_SESSION["nama"]=$data["nama"];
			$_SESSION["level"]=$data["level"];
			$_SESSION["cypherMethod"]='AES-256-CBC';
			$_SESSION["key"]=random_bytes(32);
			$_SESSION["iv"]=openssl_random_pseudo_bytes(openssl_cipher_iv_length($_SESSION["cypherMethod"]));
			if ($_SESSION["level"]=="owner") {
				header("Location: ?page=owner");
			} elseif ($_SESSION["level"]=="kasir") {
				header("Location: ?page=kasir");
			} elseif ($_SESSION["level"]=="barista") {
				header("Location: ?page=barista");
			} else {
				header("Location: ?page=pelayan");
			}
		}
	}
	
}
?>