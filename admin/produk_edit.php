<?php
include "Koneksi.php";
$id_produk = $_GET['id'];
$a = mysql_query ("SELECT id_produk, nama_produk, id_kategori, keterangan FROM produk WHERE id_produk = '$id_produk' ");
$hasil = mysql_fetch_array($a);
?>
<button type="button" style="display:inline-block; background-color:#ff1199; color:white;" onclick="javascript:$('.tambah-data').slideToggle(1000);">Tambah Data</button>
<form method="POST" action="index.php?page=produk" style="display:inline-block;">
<input type="text" name="txtcari" placeholder="Ketikkan Pencarian..."/>

<input class="cari" type="submit" value="Cari"/>
</form>
<div class="tambah-data" style="width:400px; height:300px; border:1px solid black;">
	<form method="POST" action="index.php?page=produk_proses">
	<input type="hidden" name="aksi" value="edit" />
	<input type="hidden" name="idx" value="<?php echo $hasil['id_produk'] ?>"/>
	<table width="100%">
	<tr>
		<td>ID produk</td>
		<td><input type="text"  name="txtid" value="<?php echo $hasil['id_produk']; ?>"/></td>
	</tr>
	<tr>
		<td>Nama produk</td>
		<td><input type="text" name="txtnama" value="<?php echo $hasil['nama_produk']; ?>"/></td>
	</tr>
	<tr>
				<td>Kategori</td>
				<td>
					<select name="cbkategori">
						<option value="">--Pilih Kategori--</option>
						<?php
						$kat = mysql_query ("SELECT id_kategori, nama_kategori FROM kategori ORDER BY nama_kategori ASC");
						while($hasil_kat = mysql_fetch_array($kat)){
							echo "<option value='$hasil_kat[id_kategori]'";
							if($hasil['id_kategori']==$hasil_kat['id_kategori']){
								echo "selected";
						}
							echo ">$hasil_kat[nama_kategori]</option>";
							}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td><textarea name="txtketerangan"><?php echo $hasil['keterangan'];?></textarea></td>
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
		<th>ID produk</th>
		<th>Nama produk</th>
		<th>Kategori</th>
		<th>Keterangan</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	//Langkah 1: Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM produk");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2: Tentukan banyak nya data per halaman yang di inginkan
	$data = 2;
	
	//Langkah 3: cari banyak nya halaman
	$hal = ceil($total/$data);
	
	//Langkah 4: Merubah query dengan menggunakan batas/Limit
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
		}else{
		$katakunci = "";
		}
	$a = mysql_query("SELECT A.id_produk, A.nama_produk, B.nama_kategori, A.keterangan FROM produk AS A INNER JOIN kategori AS B ON (A.id_kategori = B.id_kategori) WHERE A.id_produk LIKE '%$katakunci%' OR A.nama_produk LIKE '%$katakunci%' ORDER BY A.id_produk ASC LIMIT $start, $data");
	
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='7' align='center'>Data belum ada</td><?tr>";
	}else{
	$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td>$no.</td>";
			echo "<td>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>", $b['id_produk'])."</td>";
			echo "<td>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>", $b['nama_produk'])."</td>";
			echo "<td>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>", $b['nama_kategori'])."</td>";
			echo "<td>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>", $b['keterangan'])."</td>";
			echo "<td><button type='button' onclick=\"javascript:window.location.href='index.php?page=produk_edit&id=$b[id_produk]';\">Edit</button></td>";
			echo "<td><button type='button' onclick=\"javascript:if(confirm('Apakah data mau dihapus ?')==true){window.location.href='index.php?page=produk_proses&id=$b[id_produk]&aksi=hapus';}\">Hapus</button></td>";
			echo "</tr>";
			$no++;
		}
	}
	?>
</table>
<?php
//Langkah 5: Buat link paging nya
echo "ditampilkan total data $total";
//Link untuk PREV
if($start != 0){
	echo "<a href='index.php?page=produk&start=".($start-$data)."'>Prev;</a>";
}

//Link untuk masing2 halamannya
$x = 0;
for($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "[<a href='index.php?page=produk&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start !=$x){
	echo " <a href='index.php?page=produk&start=".($start+$data)."'>Next</a>";
}
?>