<?php $this->load->view('front/_partials/head') ?>

<body>
  <?php $this->load->view('front/_partials/navbar') ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>IKPI Bali</span></h1>
      <h2>Ikatan Konsultan Pajak Indonesia Cabang Bali</h2>
      <div class="d-flex">
        <?php if ($this->session->userdata('user_logged')) { ?>
        <?php } else { ?>
          <a href="<?php echo site_url('anggota/login') ?>" class="btn-get-started scrollto">Login</a>
        <?php } ?>
      </div>
    </div>
  </section><!-- End Hero -->

  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3>Beranda <span> IKPI Bali</span></h3>
        <p><br></p>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <h3>INFO PERATURAN</h3>
          <div class="card text-center shadow">
            <ul class="list-group list-group-flush">
              <?php foreach ($peraturan as $p) : ?>
                <li class="list-group-item" style="text-align:left;">
                  <div class="row">
                    <div class="col-9" style="font-size: 13px;">
                      Peraturan - <strong><a href="<?= site_url('front/peraturandetail/' . $p->id_peraturan) ?>"><?= $p->nama ?></a></strong>
                    </div>
                    <div class="col-3 text-muted" style="font-size: 12px; ">
                      <i><?= date('d-M-Y H:i', strtotime($p->created_at)) ?></i>
                    </div>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
            <div class="card-footer text-white py-3" style="font-size: 14px; text-align: right;">
              <strong><a href="<?= site_url('front/peraturanlist/') ?>">Lihat Semua</a></strong>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <h3>ARTIKEL DAN BERITA</h3>
          <table class="table table-bordered bg-white shadow" style="margin:0;">
            <tbody>
              <tr>
                <?php foreach ($postingan as $p) : ?>
                  <td>
                    <img src="<?= base_url('postingan/' . $p->gambar1) ?>" class="img-fluid" alt="" width="200px">
                    <p class="text-muted" style="font-size: 12px; margin:0;">
                      <!-- <i><?php // echo date('d-M-Y H:i', strtotime($p->created_at)) 
                              ?></i> -->
                      <i><?php echo date('d-M-Y', strtotime($p->tanggal)) ?></i>
                    </p>
                    <p style="font-size: 12px; margin:0;">
                      <strong><a href="<?= site_url('front/detailpostingan/' . $p->id_postingan) ?>"> <?= $p->nama ?> </a> </strong>
                    </p>
                  </td>
                <?php endforeach ?>
              </tr>
            </tbody>
          </table>
          <div class="card-footer text-white py-3" style="font-size: 14px; text-align: right;">
            <strong><a href="<?= site_url('front/postinganlist/') ?>">Lihat Semua</a></strong>
          </div>
        </div>

        <div class="col-lg-3">
          <h3>INFO ANGGOTA BARU</h3>
          <div class="card text-center shadow">
            <ul class="list-group list-group-flush">
              <?php foreach ($anggota as $a) : ?>
                <li class="list-group-item" style="text-align:left;">
                  <div class="row">
                    <div class="col-9" style="font-size: 13px;">
                      Nama : <strong><a href="<?= site_url('front/anggotadetail/' . $a->nra) ?>"><?= $a->nama ?></a></strong>
                    </div>
                    <div class="col-3 text-muted" style="font-size: 12px; ">
                      <i><?= date('d-M-Y H:i', strtotime($a->created_at)) ?></i>
                    </div>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
            <div class="card-footer text-white py-3" style="font-size: 14px; text-align: right;">
              <strong><a href="<?= site_url('front/anggotalist') ?>">Lihat Semua</a></strong>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Postingan</h2>
        <h3>Check our <span>Postingan</span></h3>
        <p>Berikut adalah Beberapa Postingan Terbaru dari IKPI Cabang Bali</p>
      </div>

      <div class="row">
        <?php foreach ($postingan as $p) : ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <a href="<?= site_url('front/detailpostingan/' . $p->id_postingan) ?>"><img class="img-fluid" src="<?= base_url('postingan/' . $p->gambar1) ?>" alt=""></a>
              <h4><a href="<?= site_url('front/detailpostingan/' . $p->id_postingan) ?>"><?= $p->nama ?></a></h4>
              <p align="left"><?php echo substr($p->keterangan, 0, 120) ?>...
                <a href="<?= site_url('front/detailpostingan/' . $p->id_postingan) ?>"><br>Lihat Lebih Lanjut</a>
              </p>
            </div>
          </div>
        <?php endforeach ?>
      </div>

    </div>
  </section> -->

  <!-- ======= Testimonials Section ======= -->
  <!-- <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> -->

  <!-- ======= Team Section ======= -->
  <!-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <h3>Our Hardworking <span>Team</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->
  <?php $this->load->view('front/_partials/footer') ?>