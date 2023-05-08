<?php
	$conn = mysqli_connect("localhost", "root", "", "hermasproject");
	if(!$conn){
		die("<script>alert('Gagal Tersambung Dengan Internet/Database')</script>");
	}
?>