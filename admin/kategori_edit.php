<?php
include "Koneksi.php";
$id_kategori = $_GET['id'];
$a = mysql_query ("SELECT id_kategori, nama_kategori FROM kategori WHERE id_kategori = '$id_kategori' ");
$hasil = mysql_fetch_array($a);
?>
<button type="button" style="display:inline-block; background-color:#ff1199; color:white;" onclick="javascript:$('.tambah-data').slideToggle(1000);">Tambah Data</button>
<form method="POST" action="index.php?page=kategori" style="display:inline-block;">
<input type="text" name="txtcari" placeholder="Ketikkan Pencarian..."/>

<input class="cari" type="submit" value="Cari"/>
</form>
<div class="tambah-data" style="width:400px; height:300px; border:1px solid black;">
	<form method="POST" action="index.php?page=kategori_proses">
	<input type="hidden" name="aksi" value="edit" />
	<input type="hidden" name="idx" value="<?php echo $hasil['id_kategori'] ?>"/>
	<table width="100%">
	<tr>
		<td>ID kategori</td>
		<td><input type="text"  name="txtid" value="<?php echo $hasil['id_kategori']; ?>"/></td>
	</tr>
	<tr>
		<td>Nama kategori</td>
		<td><input type="text" name="txtnama" value="<?php echo $hasil['nama_kategori']; ?>"/></td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="submit" value="Update"/>
		<input type="reset" value="Clear"/>
	</td>
	</tr>
	</table>
</form>
</div>

<table class="table">
	<tr class="table-header">
		<th>No.</th>
		<th>ID kategori</th>
		<th>Nama kategori</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php
	$a = mysql_query("SELECT id_kategori, nama_kategori FROM kategori ORDER BY nama_kategori ASC");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
	echo "<tr><td colspan='3' align='center'>Data belum ada </td></tr>";
	}else{
	$no=1;
	while ($b = mysql_fetch_array($a)){
		echo"<tr>";
		echo"<td>$no.</td>";
		echo"<td>$b[id_kategori]</td>";
		echo"<td>$b[nama_kategori]</td>";
		echo"<td><button type='button' onclick=\"javascript:window.location.href='index.php?page=kategori_edit&id=$b[id_kategori]';\">Edit</button></td>";
		echo"<td><button type='button' onclick=\"javascript:if(confirm('Apakah data menu dihapus?')==true) {
		window.location.href='index.php?page=kategori_proses&id=$b[id_kategori]';}\">Hapus</button></td>";
		echo"</tr>";
		$no++;
		
		}
}

?>
</table>