<?php
$halaman = (isset ($_GET['page'])) ? $_GET['page'] : "";
/* if(isset($_GET['page'])){
	$halaman= $_GET['page'];
}else{
	$halaman = "";
} */
switch($halaman){
	case 'kategori' : include "kategori.php"; break;
	case 'kategori_proses' : include "kategori_proses.php"; break;
	case 'kategori_edit' : include "kategori_edit.php"; break;
	case 'produk' : include "produk.php"; break;
	case 'produk_proses' : include "produk_proses.php"; break;
	case 'produk_edit' 	: include "produk_edit.php"; break;
	default : include "home.php"; break;
	}
?>