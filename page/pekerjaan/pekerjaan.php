<?php 
  $query = "SELECT tbl_pekerjaan.id, tbl_karyawan.nama, tbl_transaksi.qty, tbl_pekerjaan.status 
            FROM tbl_pekerjaan 
            INNER JOIN tbl_karyawan 
            ON tbl_pekerjaan.karyawan = tbl_karyawan.id 
            INNER JOIN tbl_transaksi 
            ON tbl_pekerjaan.transaksi = tbl_transaksi.id"
?> 

<!-- START:Content-->
<div class="container">

  <div class="card mt-4 mb-4">
    <div class="card-header">
      <h5>Pekerjaan</h5>
    </div>
    <div class="card-body">
      <!-- START: Button -->
      <div class="d-flex justify-content-start mb-4">
        <a href="?page=TambahPekerjaan" type="button" class="btn btn-sm btn-primary mr-3"><i class="fas fa-plus fa-sm text-white"></i> Tambah Pekerjaan</a>
      </div>
      <!-- END: Button -->
      <table id="dataTables" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php $pekerjaan = viewDatas($query); ?>
          <?php foreach($pekerjaan as $data) : ?>
          <tr>
            <td><?= $no++;?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['qty']; ?> kg</td>
            <td><?= $data['status']; ?></td>
            <td>
              &nbsp;&nbsp;
              <a href="?page=HapusPekerjaan&id=<?php echo $data['id']; ?>"
                onclick="return confirm('Yakin ingin hapus Pekerjaan <?= $data['id']; ?>');">
                <span class="fas fa-trash"></span>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- END:Content-->