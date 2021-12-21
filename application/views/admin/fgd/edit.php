<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Forum FGD</title>

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
              <h3 class="card-title">Form Forum FGD</h3>
            </div>
            <form action="<?php echo site_url('forum/updateforumfgd') ?>" method="post" enctype="multipart/form-data">
              <?php foreach ($forum_fgd as $f) : ?>

                <input type="hidden" value="<?= $f["id_forumfgd"] ?>" name="id_forumfgd">
                <input type="hidden" value="<?= $f["slug"] ?>" name="slug">
                <input type="hidden" value="<?= $f["id_user"] ?>" name="id_user">
                <input type="hidden" value="<?= $f["id_peraturan"] ?>" name="id_peraturan">
                <input type="hidden" value="<?= $f["created_at"] ?>" name="created_at">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judul" placeholder="judul" value="<?= $f["judul"] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Konten</label>
                    <textarea class="form-control" name="konten" id="konten" rows="8" placeholder="Konten" readonly><?php echo $f["konten"] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="status" class="mb-2"><strong>Status</strong></label>
                    <select name="status" class="form-control" id="">
                      <option value="Active" <?= ($f["status"] == "Active") ? "selected" : '' ?>>Active</option>
                      <option value="Pending" <?= ($f["status"]  == "Pending") ? "selected" : '' ?>>Pending</option>
                    </select>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              <?php endforeach ?>
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