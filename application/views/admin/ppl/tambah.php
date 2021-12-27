<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Form PPL</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css') ?>">
</head>
<?php $this->load->view('admin/_partials/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form PPL</h3>
            </div>
            <form action="<?php echo site_url('anggota/addppl') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama PPL</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama PPL">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal PPL</label> <br>
                  <input type="date" name="tanggal_ppl" placeholder="dd-mm-yyyy" value="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Pembukaan Pendaftaran</label> <br>
                  <input type="date" name="tanggal_pendaftaran_buka" placeholder="dd-mm-yyyy" value="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Penutupan Pendaftaran</label> <br>
                  <input type="date" name="tanggal_pendaftaran_tutup" placeholder="dd-mm-yyyy" value="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga Pendaftaran (Rp)</label>
                  <input type="number" name="harga_pendaftaran" class="form-control" id="harga_pendaftaran" placeholder="Harga Pendaftaran">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <div class="input-group">
                    <input type="file" name="gambar">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Keterangan</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="15" placeholder="Keterangan"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Point</label>
                  <input type="number" name="point" class="form-control" id="point" placeholder="Point">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.1.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('admin/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('admin/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('admin/dist/js/demo.js') ?>"></script>
<!-- Page specific script -->
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>
</body>

</html>