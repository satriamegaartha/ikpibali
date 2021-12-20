<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Kegiatan</title>

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
            <form action="<?php echo site_url('anggota/updatepostingan') ?>" method="post" enctype="multipart/form-data">
              <?php foreach ($postingan as $p) : ?>
                <input type="hidden" value="<?= $p->id_postingan ?>" name="id_postingan">
                <input type="hidden" value="<?= $p->created_at ?>" name="created_at">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal</label> <br>
                    <input type="date" name="tanggal" placeholder="dd-mm-yyyy" value="<?= $p->tanggal ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kegiatan</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kegiatan" value="<?= $p->nama ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan" rows="8" placeholder="Keterangan"><?php echo $p->keterangan ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 1</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar1; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="1" />

                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 1
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan Gambar 1</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 1" value="<?= $p->keterangan1 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 2</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar2; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="2" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 2
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Keterangan Gambar 2</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 2" value="<?= $p->keterangan2 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 3</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar3; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="3" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 3
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword3">Keterangan Gambar 3</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 3" value="<?= $p->keterangan1 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 4</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar4; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="4" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 4
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Keterangan Gambar 4</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 4" value="<?= $p->keterangan4 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 5</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar5; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="5" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 5
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword5">Keterangan Gambar 5</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 5" value="<?= $p->keterangan5 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 6</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar6; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="6" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 6
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword6">Keterangan Gambar 6</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 6" value="<?= $p->keterangan6 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 7</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar7; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="7" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 7
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword7">Keterangan Gambar 7</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 7" value="<?= $p->keterangan7 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 8</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar8; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="8" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 8
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword8">Keterangan Gambar 8</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 8" value="<?= $p->keterangan8 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 9</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar9; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="9" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 9
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword9">Keterangan Gambar 9</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 9" value="<?= $p->keterangan9 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 10</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar10; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="10" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 10
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword10">Keterangan Gambar 10</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 10" value="<?= $p->keterangan10 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 11</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar11; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="11" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 11
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword11">Keterangan Gambar 11</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 11" value="<?= $p->keterangan11 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 12</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar12; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="12" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 12
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword12">Keterangan Gambar 12</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 12" value="<?= $p->keterangan12 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 13</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar13; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="13" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 13
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword13">Keterangan Gambar 13</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 13" value="<?= $p->keterangan13 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 14</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar14; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="14" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 14
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword14">Keterangan Gambar 14</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 14" value="<?= $p->keterangan14 ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar 15</label>
                    <div class="input-group">
                      <img src="<?= base_url('postingan/') . $p->gambar15; ?>" width="200px class=" img-thumbnail>
                      <div class="form-check" style="margin-top:4rem">
                        <div class="container">
                          <div class="row">
                            <div class="col" style="margin-left: 20px; margin-bottom: 7px;">
                              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="deleteGambar[]" value="15" />
                              <label class="form-check-label" for="flexCheckDefault">
                                Delete Gambar 15
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="file" name="gambar[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword15">Keterangan Gambar 15</label>
                    <input type="text" name="keterangan_gambar[]" class="form-control" id="keterangan" placeholder="Keterangan Gambar 15" value="<?= $p->keterangan15 ?>">
                  </div>




                </div>
                <!-- /.card-body -->

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