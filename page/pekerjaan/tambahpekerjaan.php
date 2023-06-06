<?php
	// Mengambil  ID Karyawan
  $id = $_SESSION['id'];
  $result = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = '$id'");
  $user = mysqli_fetch_assoc($result);
 
  if( isset($_POST['submit'])) {
    $karyawan 			= ($_POST['id']);
    $transaksi				= strip_tags($_POST['transaksi']);
    $status 		= strip_tags($_POST['status']);
    $query 				= "INSERT INTO tbl_pekerjaan VALUES ('', $karyawan, '$transaksi', '$status')";

    if( queryData($query) > 0 ){
        echo "<script>
                        alert('Pekerjaan berhasil ditambahkan');
                        document.location.href = '?page=Pekerjaan';
                    </script>";
    } else {
        echo "<script>
                        alert('Pekerjaan gagal ditambahkan');
                        document.location.href = '?page=Pekerjaan';
                    </script>";
    }
}
$query1 = "SELECT tbl_transaksi.id, tbl_transaksi.tanggal ,tbl_pelanggan.nama, tbl_paket.paket, tbl_transaksi.qty, tbl_transaksi.biaya, tbl_transaksi.bayar, tbl_transaksi.kembalian 
FROM tbl_transaksi 
INNER JOIN tbl_pelanggan 
ON tbl_transaksi.id_pelanggan = tbl_pelanggan.id 
INNER JOIN tbl_paket 
ON tbl_transaksi.kd_paket = tbl_paket.id";
?>
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
                        <input type="text" class="form-control" id="transaksi" name="transaksi" placeholder="Pilih Transaksi" readonly
                            required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalTransaksi"><i
                                    class="fas fa-search fa-sm"></i></button>
                        </div>
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

</div>
<!-- START: Content -->

<!-- Modal Transaksi -->
<div class="modal fade bd-example-modal-lg" id="modalTransaksi" tabindex="-1" role="dialog" aria-labelledby="modal"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="modal">Pilih Transaksi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>#</th>
										<th>Id Transaksi</th>
										<th>Kuantiti</th>
										<th>Jenis </th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php $transaksi = viewDatas($query1); ?>
									<?php foreach($transaksi as $data) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td>
											<button id="pilih-transaksi" class="btn btn-sm btn-success pilih-transaksi"
												data-transaksi="<?= $data['id'] ?>">
												<i class="fas fa-check-double fa-sm"></i>
											</button>
										</td>
										<td><?= $data['id']; ?></td>
										<td><?= $data['qty']; ?> Kg </td>
										<td><?= $data['paket']; ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
