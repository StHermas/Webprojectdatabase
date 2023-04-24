<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test Web Dev & Database</title>
</head>
<body>
	<?php
		include("koneksi.php");
		$headline = "Laundry Bintang Resik";
	
	?>
	<div align="center">
		<?php
			echo "<h1>".$headline."</h1>";
		?>
		<br>
		<?php
			if(isset($_POST['sb']))
			{
				$namapelanggan = $_POST['nmp'];
				$alamatpelanggan = $_POST['alp'];
				$notelppelanggan = $_POST['ntp'];

				$q = mysqli_query($conn, "insert into pelanggan(nama_pelanggan, alamat_pelanggan, notelp_pelanggan) values ('$namapelanggan', '$alamatpelanggan', '$notelppelanggan')");

				if($q)
				{
					echo "Berhasil Input";
				}
				else
				{
					echo "Gagal Input";
				}
			}
		?>
	</div>
	<br>
	<div align="center">
		<form method="post" action="">
			<label>Nama</label>
			<br>
			<input type="text" name="nmp"><br><br>
			<label>Alamat</label>
			<br>
			<textarea name="alp"></textarea><br><br>
			<label>No. Telp</label>
			<br>
			<input type="text" name="ntp"><br><br>
			<button type="submit" name="sb">SUBMIT</button>
		</form>
	</div>
</body>
</html>