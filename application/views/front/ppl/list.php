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
      </div>
    </div>
  </section><!-- End Hero -->




  <section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="section-title">
        <h3>PPL <span>IKPI BALI</span></h3>
      </div>

      <div class="row">
        <?php foreach ($ppl as $p) : ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <a href="<?php echo site_url('front/detailppl/' . $p["id_ppl"]) ?>">
              <div class="member">
                <div class="member-img">
                  <img src="<?= base_url('ppl/') . $p['gambar']; ?>" class="img-fluid" alt="">

                </div>
                <div class="member-info">
                  <h4><?= $p['nama']; ?></h4>
                  <span><?= date('d F Y', strtotime($p['tanggal_ppl'])); ?></span>
                  <span>Rp. <?= number_format($p['harga_pendaftaran'], 0, ',', '.'); ?></span>

                  <?php if ($this->session->userdata('user_logged')) { ?>
                    <span><a href="<?php echo site_url('front/daftarppl/' . $p["id_ppl"]) ?>" class="btn btn-success btn-sm mt-2"></i> Daftar</a></span>
                  <?php } else { ?>
                    <span><a href="<?php echo site_url('anggota/login') ?>" class="btn btn-success btn-sm mt-2" onclick="return confirm('Anda Belum Login!');"></i> Daftar</a></span>
                  <?php } ?>

                </div>
              </div>
            </a>
          </div>
        <?php endforeach ?>

      </div>

    </div>
  </section>




  <?php $this->load->view('front/_partials/footer') ?>