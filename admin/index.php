<?php session_start();?>
<?php
if(isset($_SESSION['user'])==false){
	header("location:login.php");
	}
?>
<html>
	<head>
		<title>&trade; Toko Online</title>
		<link rel="stylesheet" href="style.css"></link>
		<script type="text/javascript" src="jquery.js"></script>
	</head>
	<body>
		<div id="header">
		
		</div>
		
		<div id="kiri">
		
		<div id="info-user">
		<b><?php echo $_SESSION['nama']; ?></b>
		<a href="#" onclick="javascript: if(confirm('Apakah mau keluar?')==true) {window.location.href='logout.php' ;}">Keluar</a>
		</div>
		<div id="menu">
		<h4>Master Data </h4>
		<ul>
			<li><a href="index.php?page=kategori">Kategori Produk</a></li>
			<li><a href="index.php?page=produk">Data Produk</a></li>
		</ul>
		</div>
		</div>
		<div id="kanan">
			<?php include "isi.php";?>
		</div>
		
		<div id="footer">
		
		</div>
	</body>
</html>	