<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laundry Bintang Resik</title>
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
        	if (isset($_SESSION['email'])) 
            {
                header("Location: index.php");
            }
			if(isset($_POST['sb']))
			{
				$namapelanggan = $_POST['nmp'];
				$alamatpelanggan = $_POST['alp'];
				$notelppelanggan = $_POST['ntp'];
                $jeniscucian = $_POST['jeniscucian'];
                $pegawai = $_POST['pegawai'];
                $beratcucian = $_POST['kg'];

				$q = mysqli_query($conn, "insert into pelanggan values ('','$namapelanggan', '$alamatpelanggan', '$notelppelanggan')");
                
                $ht1=mysqli_query($conn, "select * from jenis_jasa where id_jasa=$jeniscucian");
                $ht2=mysqli_fetch_array($ht1);
                $h=$ht2['harga_jasa'];
                $htf=$h*$beratcucian;
				if($q)
				{
                    $q1=mysqli_query($conn, "select * from pelanggan where nama_pelanggan='$namapelanggan'");
                    $q2=mysqli_fetch_array($q1);
                    $id=$q2['id_pelanggan'];
                
                    $q2 = mysqli_query($conn, "INSERT INTO transaksi VALUES ('', '$id', '$pegawai', '$jeniscucian', 'NOW()','CURDATE()+INTERVAL 2 DAY', '$beratcucian', '$htf');");
                    echo "<script>alert('Input berhasil!')</script>";
                    if(!$q2){
                        echo "<script>alert('Gagal Input!')</script>";
                    }
                }
				else
				{
					echo "<script>alert('Gagal Input!')</script>";
				}
			}
		?>
	</div>
	<br>
	<div align="center">
		<form method="post" action="">
			<label>Nama</label>
			<br>
			<input type="text" name="nmp" required><br><br>
			<label>Alamat</label>
			<br>
			<textarea name="alp" style="resize:none;width:300px;height:100px;" required></textarea><br><br>
			<label>No. Telp</label>
			<br>
			<input type="text" name="ntp" required><br><br>
            <label>Jenis Cucian</label>
            <select name="jeniscucian">
                <?php
                    $jc=mysqli_query($conn, "select * from jenis_jasa" );
                    while($for = mysqli_fetch_array($jc))
                    {
                         ?>
                         <option value="<?php echo $for['id_jasa']?>"><?php echo $for['nama_jasa']?></option>    
                          <?php
                    }
                ?>
            </select>
            <label>Pegawai</label>
            <select name="pegawai">
                <?php
                    $jc=mysqli_query($conn, "select * from pegawai" );
                    while($for = mysqli_fetch_array($jc))
                    {
                        ?>
                        <option value="<?php echo $for['id_pegawai']?>"><?php echo $for['nama_pegawai']?></option>    
                        <?php
                    }
                ?>
            </select>
            <br>
            <br>
			<label>Berapa Kilo</label>
			<br>
			<input type="number" name="kg" step="any" ><br><br> 
            <br>
			<button type="submit" name="sb">Submit</button>
            <a href="history.php"><button>History</button></a>
            <a href="updateprofil.php"><button>Ubah Password</button></a>
        </form>
    </div>
</body>
</html>