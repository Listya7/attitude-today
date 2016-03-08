<?php
include "Koneksi.php";
$user = $_POST['user'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$nama = $_POST['nama'];

if($pass1 != $pass2){
	echo "<script>alert('Password yang diketik tidak cocok.');</script>";
	}else{
	$a = mysql_query ("INSERT INTO admin (user, pass, nama) VALUES ('$user', MD5('$pass1'), '$nama') ");
	if($a == true) {
		echo "<script>alert('daftar berhasil');</script>";
	}else{
		echo "<script>alertC('daftar gagal');</script>";
	}
}
?>
<meta http-equiv="refresh" content="0;url=index.php" />

