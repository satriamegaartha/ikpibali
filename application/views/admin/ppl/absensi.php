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
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
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
                <div class="col-sm-6">
                    <h1>Absensi Peserta <?= $ppl['nama']; ?></h1>
                    <h5><?= date('d F Y', strtotime($ppl["tanggal_ppl"])); ?></h5>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo site_url('anggota/checkabsensippl/' . $ppl["id_ppl"]) ?>" method="POST">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Role</th>
                                            <th>Nama</th>
                                            <th>Kehadiran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pesertappl as $p) : ?>
                                            <tr>
                                                <td><?= $p['id_pendaftar'] ?></td>
                                                <td><?= $p['role'] ?></td>
                                                <td><?= $p['nama'] ?></td>
                                                <td>
                                                    <input type="checkbox" id="flexCheckDefault" name="absensi[]" value="<?= $p['id']; ?>" <?= ($p["kehadiran"] == "Hadir") ? "checked" : "" ?> />
                                                </td>
                                            </tr>
                                        <?php endforeach ?>

                                </table>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
<!-- DataTables  & Plugins -->
<script src="<?= base_url('admin/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('admin/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('admin/dist/js/demo.js') ?>"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html>