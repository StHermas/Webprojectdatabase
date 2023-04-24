<?php
	$conn = mysqli_connect("localhost", "root", "", "hermasproject");
	if($conn)
	{
		echo"Sukses";
	}
	else
	{
		echo"Gagal";
	}
?>