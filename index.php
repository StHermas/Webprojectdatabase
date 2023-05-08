<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Admin</title>
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
				$username = $_POST['usm'];
				$password = md5($_POST['psw']);
				$sql = "SELECT * FROM autentication WHERE name_user='$username' AND pass_user='$password'";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows>0)
				{
					$row=mysqli_fetch_assoc($result);
					$_SESSION['email'] = $row['email'];
					header("Location: transaksi.php");
;				}
				else
				{
					echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
				}
			}
		?>
	</div>
	<br>
	<div align="center"; class="alert alert-warning" role="alert">

		<form method="post" action="">
			<label>Username</label>
			<br>
			<input type="text" placeholder="Username" name="usm" required><br><br>
			<label>Password</label>
			<br>
			<input type="password" placeholder="Password" name="psw" required><br><br>
			<button type="submit" name="sb">Submit</button>

		</form>
	</div>
</body>
</html>