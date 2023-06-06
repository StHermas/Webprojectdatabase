<?php 
  // Jika tidak ada id di url
  if (!isset($_GET['id'])) {
    header("Location: ?page=Pekerjaan");
    exit;
  }

  // Mengambil ID dari URL
  $id = $_GET['id'];

  if (deleteData('tbl_pekerjaan', $id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = '?page=Pekerjaan';
          </script>";
  } else {
    echo "<script>
            alert('Pekerjaan gagal dihapus');
          </script>";  
  }
?>