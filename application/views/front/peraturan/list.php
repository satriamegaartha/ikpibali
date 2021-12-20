<?php $this->load->view('front/_partials/head') ?>

<body>
  <?php $this->load->view('front/_partials/navbar') ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>IKPI Bali</span></h1>
      <h2>Ikatan Konsultan Pajak Indonesia Cabang Bali</h2>
      <div class="d-flex">
        <a href="<?php echo site_url('anggota/login') ?>" class="btn-get-started scrollto">Login</a>
        <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
      </div>
    </div>
  </section><!-- End Hero -->

  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3>Peraturan <span> IKPI Bali</span></h3>
        <p><br></p>
      </div>

      <div class="row">
        <div class="col">
          <h3>Daftar List Peraturan</h3>
          <div class="card text-center shadow">
            <ul class="list-group list-group-flush">
              <?php foreach($peraturan as $p):?>
              <li class="list-group-item" style="text-align:left;">
                <div class="row">
                  <div class="col-9" style="font-size: 13px;">
                  <strong><a href="<?= site_url('front/Peraturandetail/'.$p->id_peraturan)?>"><?= $p->nama?></a></strong>
                  </div>
                  <div class="col-3 text-muted" style="font-size: 12px; ">
                    <i>Tanggal : <?= date('d-M-Y H:i',strtotime($p->created_at))?></i>
                  </div>
                </div>
              </li>
              <?php endforeach?>
            </ul>
          </div>
        </div>

    </div>
  </section>

  <?php $this->load->view('front/_partials/footer') ?>