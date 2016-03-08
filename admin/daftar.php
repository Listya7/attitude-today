<html>
	<head>
		<title>Daftar Akun Baru</title>
	</head>
	<h2>Pendaftaran User Admin</h2>
	<form method="POST" action="daftar_proses.php">
		<table>
			<tr>
				<td>User</td>
				<td><input type="text" name="user" required /></td>
			</tr>
			
			<tr>
				<td>Pass</td>
				<td><input type="password" name="pass1" required /></td>
			</tr>
			
			 <tr>
				<td>Pass Ulang</td>
				<td>
					<input type="password" name="pass2" required onkeyup="javascript: if(this.form.pass1.value != this.form.pass2.value){ document.getElementById('cek_pass').style.display='block'; }else{ document.getElementById('cek_pass').style.display='none'; }" />
<span id="cek_pass" style="display:none; color:red; text-decoration:blink;">Password yang diketikkan tidak sama</span>
				</td>
			</tr>
			
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required /></td>
			</tr>
			
			<tr>
				<td>
				<input type="submit" value="simpan" />
				<input type="reset" value="bersihkan" />
				</td>
			</tr>
		</table>
	</form>
	</body>
</html>