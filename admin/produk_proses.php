<?php
include "koneksi.php";

switch($_REQUEST['aksi']){
	case 'tambah' :
	$id		= $_POST['txtid'];
	$nama	= $_POST['txtnama'];
	$kategori = $_POST['cbkategori'];
	$keterangan = $_POST['txtketerangan'];
	$harga = $_POST['txtharga'];
	$asal_file = $_FILES['filefoto']['tmp_name'];
	$tujuan_file = $_FILES['filefoto']['name']
	if(!file_exists("foto")){
		mkdir("foto");
	}
	move_uploaded_file($asal_file, "foto/".$tujuan_file);
	$a = mysql_query("INSERT INTO produk VALUES('$id', '$nama', '$kategori', '$harga', '$tujuan_file', '$keterangan') ");
	if($a == true){
	echo "<script>alert('Tambah berhasil');</script>";
	}else{
	echo "<script>alert('Tambah gagal');</script>";
	}
break;

	case 'edit' :
		$id		= $_POST['txtid'];
		$idx	= $_POST['idx'];
		$nama	= $_POST['txtnama'];
		$kategori = $_POST['cbkategori'];
		$keterangan = $_POST['txtketerangan'];
		$a = mysql_query("UPDATE produk SET id_kategori = '$id', nama_produk = '$nama', id_kategori = '$kategori', keterangan = '$keterangan' WHERE id_produk = '$idx' ");
		if($a == true){
			echo "<script>alert('Update berhasil');</script>";
		}else{
			echo "<script>alert('Update gagal');</script>";
		}
break;

	case 'hapus' :
		$id = $_GET['id'];
		$a = mysql_query("DELETE FROM produk WHERE id_kategori = '$id' ");
		if($a == true){
			echo "<script>alert('Hapus berhasil');</script>";
		}else{
			echo "<script>alert('Hapus gagal');</script>";
		}
break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=produk" />