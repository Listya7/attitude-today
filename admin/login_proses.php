 <?php
 session_start();
 include"Koneksi.php";
 include"securimage/securimage.php";
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 $kode = $_POST['kode'];
 $gambar = new Securimage();
 $cocok = $gambar->check($kode);
 if($cocok== true){
	//jika kode yang dimasukkan sama
	$a = mysql_query("SELECT user, nama FROM admin WHERE user = '$user' AND pass = MD5('$pass')");
	$jumlah = mysql_num_rows($a);
	if($jumlah==0){
		echo"<script>alert('User/Pass Salah');</script>";
		}else{
			$b = mysql_fetch_array($a);
			echo "<script>alert('Hallo $b[nama]');</script>";
			$_SESSION['user'] = $b['user'];
			$_SESSION['nama'] = $b['nama'];
			
			}
}else{
			//jika tidak sama
		echo"<script>alert('Kode tidak cocok!');</script>";
}
 ?>
<meta http-equiv="refresh" content="0;url=index.php" />