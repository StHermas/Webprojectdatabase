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
		$headline = "History Transaksi";
	
	?>
	<div align="center">
		<?php
			echo "<h1>".$headline."</h1>";
		?>
		<br>

	</div>
	<br>
	<div align="center">
          <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Cucian</th>
                <th>Berat</th>
                <th>Harga</th>
                <th>Masuk</th>
                <th>Selesai</th>
                <th>Tindakan</th>
            </tr>
            <?php
                $qv=mysqli_query($conn, "select a. id_transaksi, b.nama_pelanggan,a.tanggal_masuk, a.tanggal_selesai, a.berat_cucian, a.total_harga, c.nama_jasa from transaksi as a inner join pelanggan as b on a.id_pelanggan = b.id_pelanggan inner join jenis_jasa as c on a.id_jasa = c.id_jasa");
                $j=1;
                while($i=mysqli_fetch_array($qv))
                {
            
            ?>
            <tr>
                <td><?php echo $j;?></td>
                <td><?php echo $i['nama_pelanggan'];?></td>
                <td><?php echo $i['nama_jasa'];?></td>
                <td><?php echo $i['berat_cucian'];?></td>
                <td><?php echo $i['total_harga'];?></td>
                <td><?php echo $i['tanggal_masuk'];?></td>
                <td><?php echo $i['tanggal_selesai'];?></td>
                <td>
                    <a href="delete.php?id=<?php echo$i['id_transaksi']?>">Delete</a>
                </td>
            </tr>
            <?php
                    $j++;
                }
            ?>
          </table>  
	</div>
</body>
</html>