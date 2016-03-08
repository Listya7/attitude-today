<?php
include "koneksi.php";
?>
<button type="button" style="display:inline-block; background-color:#ff1199; color:white;" onclick="javascript:$('.tambah-data').slideToggle(1000);">Tambah Data</button>
<form method="POST" action="index.php?page=kategori" style="display:inline-block;">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
		}
	?>
	<input type="text" name="txtcari" placeholder="Ketikkan Pencarian..." autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input class="cari" type="submit" value="Cari" />
</form>

<div class="tambah-data" style="display:none; width:400px; height:100px; border:1px solid black;">
	<form method="POST" action="index.php?page=kategori_proses">
		<input type="hidden" name="aksi" value="tambah" />
		<table width="100%">
			<tr>
				<td>ID Kategori</td>
				<td><input type="text" name="txtid" /></td>
			</tr>
			<tr>
				<td>Nama Kategori</td>
				<td><input type="text" name="txtnama" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Simpan" />
					<input type="reset" value="Clear" />
				</td>
			</tr>
		</table>
	</form>
</div>

<table class="table">
	<tr class="table-header">
		<th>No.</th>
		<th>ID Kategori</th>
		<th>Nama Kategori</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	//Langkah 1: Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM kategori");
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
	$a = mysql_query("SELECT id_kategori, nama_kategori FROM kategori WHERE id_kategori LIKE'%$katakunci%'OR nama_kategori LIKE '%$katakunci%' ORDER BY nama_kategori ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='3' align='center'>Data belum ada</td><?tr>";
	}else{
	$no=1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td>$no.</td>";
			echo "<td>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>", $b['id_kategori'])."</td>";
			echo "<td>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>", $b['nama_kategori'])."</td>";
			echo "<td><button type='button' onclick=\"javascript:window.location.href='index.php?page=kategori_edit&id=$b[id_kategori]';\">Edit</button></td>";
			echo "<td><button type='button' onclick=\"javascript:if(confirm('Apakah data mau dihapus ?')==true){window.location.href='index.php?page=kategori_proses&id=$b[id_kategori]&aksi=hapus';}\">Hapus</button></td>";
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
	echo "<a href='index.php?page=kategori&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing2 halamannya
for($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "[<a href='index.php?page=kategori&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start !=$x){
	echo " <a href='index.php?page=kategori&start=".($start+$data)."'>Next</a>";
}
?>