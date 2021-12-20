<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Form Kegiatan</title>

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
              <h3 class="card-title">Form Kegiatan</h3>
            </div>
            <form action="<?php echo site_url('anggota/addpostingan') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label> <br>
                  <input type="date" name="tanggal" placeholder="dd-mm-yyyy" value="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Kegiatan</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kegiatan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Keterangan</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="8" placeholder="Keterangan"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar 1</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Keterangan Gambar 1</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 1">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 2</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">Keterangan Gambar 2</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 2">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 3</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword3">Keterangan Gambar 3</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 3">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 4</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Keterangan Gambar 4</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 4">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 5</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword5">Keterangan Gambar 5</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 5">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 6</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword6">Keterangan Gambar 6</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 6">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 7</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword7">Keterangan Gambar 7</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 7">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 8</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword8">Keterangan Gambar 8</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 8">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 9</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword9">Keterangan Gambar 9</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 9">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 10</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword10">Keterangan Gambar 10</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 10">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 11</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword11">Keterangan Gambar 11</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 11">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 12</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword12">Keterangan Gambar 12</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 12">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 13</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword13">Keterangan Gambar 13</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 13">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 14</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword14">Keterangan Gambar 14</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 14">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar 15</label>
                  <div class="input-group">
                    <input type="file" name="gambar[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword15">Keterangan Gambar 15</label>
                  <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 15">
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