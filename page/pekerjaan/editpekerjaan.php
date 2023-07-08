<?php 
	// Jika tidak ada ID di URL
	if (!isset($_GET['id'])) {
		header("Location: ?page=Transaksi");
		exit;
	}

	// Ambil ID dari URL
	$id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM tbl_pekerjaan WHERE id = '$id'");
    $pekerjaan1 = mysqli_fetch_assoc($result);

    //Ambil Data User
    $id1 = $_SESSION['id'];
    $result1 = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = '$id1'");
    $user= mysqli_fetch_assoc($result1);

	// Ambil semua data pelanggan berdasarkan ID
	$data = viewData("SELECT * FROM tbl_pekerjaan WHERE id = '$id'");

	if( isset($_POST['submit'])) {
		$karyawan 			= $_POST['karyawan'];
		$transaksi 			= strip_tags($_POST['transaksi']);
		$status         	= strip_tags($_POST['status']);
		$query				= "UPDATE tbl_pekerjaan SET
                                        status='$status'
										WHERE id 				= '$id'";

		if( queryData($query) > 0 ){
			echo "<script>
							alert('Data berhasil diubah');
							document.location.href = '?page=Pekerjaan';
					</script>";
			} else {
				echo "<script>
                alert('Data gagal diubah');
                document.location.href = '?page=Pekerjaan';
							</script>";
			}
	}
?>


<!-- START: Content -->
<div class="container container-fluid">

<div class="card mt-4 mb-4">
    <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
        <a>Tambah Pekerjaan</a>
        <a href="?page=Transaksi" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-chevron-left fa-sm fa-fw"></i>
        </a>
    </h5>
    <div class="card-body">

        <form method="post" action="">
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Nama Karyawan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="karyawan" name="karyawan" value="<?= $user['nama']; ?>" required
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID Karyawan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="id" name="id" value="<?= $user['id']; ?>" required
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="transaksi" class="col-sm-2 col-form-label">Transaksi</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" id="transaksi" name="transaksi" value="<?=$pekerjaan1['transaksi'];?>" placeholder="Pilih Transaksi" readonly
                            required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select id="status" name="status" placeholder="Status" class="form-control" required>
                        <option value="Selesai">Selesai</option>
                        <option value="Belum Selesai">Belum Selesai</option>
                        <option value="Selesai Separuh">Selesai Separuh</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-center">
					<button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
					<button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
			</div>
        </form>
    </div>
</div>
<!-- Akhir Isi Halaman -->
