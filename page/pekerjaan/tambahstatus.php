<?php
 
  if( isset($_POST['submit'])) {
    $status 		= ($_POST['status']);
    $query 				= "INSERT INTO tbl_status VALUES ('', '$status')";

    if( queryData($query) > 0 ){
        echo "<script>
                        alert('Status Berhasil Ditambah');
                        document.location.href = '?page=TambahPekerjaan';
                    </script>";
    } else {
        echo "<script>
                        alert('Status Sudah tersedia');
                        document.location.href = '?page=TambahPekerjaan';
                    </script>";
    }
}
?>
<div class="container container-fluid">

<div class="card mt-4 mb-4">
    <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
        <a>Tambah Status</a>
        <a href="?page=Pekerjaan" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-chevron-left fa-sm fa-fw"></i>
        </a>
    </h5>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Nama Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="status" name="status" required>
                </div>
            </div>
            <div class="card-footer text-center">
					<button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
			</div>
        </form>
    </div>
</div>

</div>

