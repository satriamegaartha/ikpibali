<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IKPI BALI Dashboard</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css')?>">
</head>
<?php $this->load->view('admin/_partials/sidebar')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Peraturan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-11">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Terbaru</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?= site_url('anggota/tambahperaturan') ?>">Tambah Peraturan</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <?php if($peraturan != null):?>
                    <?php foreach($peraturan as $p):?>
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle" src="<?= base_url('admin/dist/img/administrator.png')?>" alt="User Image">
                        <span class="username">
                          <a href="<?= site_url('anggota/editperaturan/'.$p->id_peraturan)?>">
                          <?= $p->nama?>
                          </a>
                        </span>
                        <span class="description">
                        <?php echo date('d-m-Y H:i:s',strtotime($p->created_at))?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                          <?= $p->keterangan?>
                      </p>
                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <div class="input-group-append">
                              <a class="btn btn-success" download="<?= $p->file?>" href="<?php echo base_url(); ?>peraturan/<?= $p->file;?>" title="Peraturan">Download Peraturan</a>
                          </div>
                        </div>
                      </form>
                    </div>
                    <?php endforeach?>
                    <?php elseif($peraturan == null):?>
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?= base_url('admin/dist/img/user7-128x128.jpg')?>" alt="User Image">
                        <span class="username">
                          <a href="#">Administrator</a>
                          <a href="#" class="float-right btn-tool"></a>
                        </span>
                        <span class="description">-- -- --  </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Peraturan Belum Di Upload
                      </p>
                      <!-- <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Download Peraturan</button>
                          </div>
                        </div>
                      </form> -->
                    </div>
                    <?php endif?>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
<script src="<?= base_url('admin/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('admin/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('admin/dist/js/demo.js')?>"></script>
</body>
</html>