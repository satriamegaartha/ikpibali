<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peserta PPL</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css') ?>">
</head>
<?php $this->load->view('admin/_partials/sidebar') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peserta <?= $ppl['nama']; ?></h1>
                    <h5><?= date('d F Y', strtotime($ppl["tanggal_ppl"])); ?></h5>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item py-3">
                                    <b>Id: </b>
                                    <p class="float-right my-0"><?= $pesertappldetail["id_pendaftar"] ?></p>
                                </li>
                                <li class="list-group-item py-3">
                                    <b>Nama: </b>
                                    <p class="float-right my-0"><?= $pesertappldetail["namapeserta"] ?></p>
                                </li>
                                <li class="list-group-item py-3">
                                    <b>Email: </b>
                                    <p class="float-right my-0"><?= $pesertappldetail["emailpeserta"] ?></p>
                                </li>
                                <li class="list-group-item py-3">
                                    <b>No Telp: </b>
                                    <p class="float-right my-0"><?= $pesertappldetail["notelppeserta"] ?></p>
                                </li>
                                <li class="list-group-item py-3">
                                    <b>Alamat: </b>
                                    <p class="float-right my-0"><?= $pesertappldetail["alamatpeserta"] ?></p>
                                </li>
                                <li class="list-group-item py-3">
                                    <b>Role:</b>
                                    <p class="float-right my-0"><?= $pesertappldetail["role"] ?></p>
                                </li>
                                <li class="list-group-item py-3">
                                    <b>Harga Pendaftaran: </b>
                                    <p class="float-right my-0"><?= number_format($pesertappldetail['harga_pendaftaran'], 0, ',', '.'); ?></p>
                                </li>
                                <li class="list-group-item py-3">
                                    <form action="<?php echo site_url('anggota/updatepesertappl/' . $pesertappldetail["id"]) ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <b>Status Pembayaran: </b>
                                            </div>
                                            <div class="col-6">
                                                <select name="status_pembayaran" class="form-control">
                                                    <option <?php echo ($pesertappldetail["status_pembayaran"] == 'Upload Bukti Transfer') ? 'selected' : ''; ?>>Upload Bukti Transfer</option>
                                                    <option <?php echo ($pesertappldetail["status_pembayaran"] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                                    <option <?php echo ($pesertappldetail["status_pembayaran"] == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="hidden" value="<?= $pesertappldetail["id"] ?>" name="id_ppluser">
                                                <button type="submit" class="btn btn-primary mt-3 float-right">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item py-3">
                                    <b>Bukti Transfer: </b>
                                    <img src="<?= base_url('bukti_transfer_ppl/') . $pesertappldetail['bukti_transfer']; ?>" class="img-thumbnail mt-3">
                                </li>
                                <?php if ($pesertappldetail['bukti_transfer']) { ?>
                                    <li class="list-group-item py-3">
                                        <b>Bukti Kehadiran: </b>
                                        <img src="<?= base_url('bukti_hadir/') . $pesertappldetail['bukti_hadir']; ?>" class="img-thumbnail mt-3">
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                        <!-- /.card-body -->
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
<!-- AdminLTE App -->
<script src="<?= base_url('admin/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('admin/dist/js/demo.js') ?>"></script>
</body>

</html>