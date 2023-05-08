<?php
    include("koneksi.php");
    $id=$_GET['id'];
    $del=mysqli_query($conn, "delete from transaksi where id_transaksi=$id");
    if($del){
        header("Location: history.php");
    }
    else{
        echo "<script>alert('Gagal Delete!')</script>";
    }
?>