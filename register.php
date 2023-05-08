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
		$headline = "Registrasi Admin";
        error_reporting(0);
        session_start();
	?>
	<div align="center">
    <?php
        echo "<h1>".$headline."</h1>"; 
        if (isset($_SESSION['email'])) 
        {
            header("Location: index.php");
        }
  
        if (isset($_POST['sb'])) 
        {
             $username = $_POST['usm'];
             $email = $_POST['email'];
             $password = md5($_POST['pwd']);
             $cpassword = md5($_POST['cpwd']);
  
            if ($password == $cpassword) 
            {
                $sql = "SELECT * FROM autentication WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                if (!$result->num_rows > 0) 
                {
                    $sql = "INSERT INTO autentication (name_user, pass_user, email)
                     VALUES ('$username', '$password', '$email')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) 
                    {
                        echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                        $username = "";
                        $email = "";
                        $_POST['password'] = "";
                        $_POST['cpassword'] = "";

                    } else 
                    {
                        echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                    }
         } 
         else 
         {
             echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
         }
          
     } else 
    {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
    }
  
 ?>
	</div>
	<br>
	<div align="center">
        <label>Username</label>
		<br>
		<input type="text" placeholder="Username" name="usm" required><br><br>
        <label>Email</label>
		<br>
		<input type="text" placeholder="Email" name="email" required><br><br>
        <label>Paswword</label>
		<br>
		<input type="password" placeholder="Password" name="pwd" required><br><br>
        <label>Ulangi Password</label>
		<br>
		<input type="password" placeholder="Password" name="cpwd" required><br><br>
        <br>
        <button type="submit" name="sb">Submit</button>    
	</div>
</body>
</html>