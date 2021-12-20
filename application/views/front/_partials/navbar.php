<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.html">IKPI Bali<span>.</span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="<?= site_url('front/index/') ?>">Home</a></li>
        <li><a class="nav-link scrollto" href="<?= site_url('front/anggotalist/') ?>">Anggota</a></li>

        <li class="dropdown"><a href="#"><span>PPL</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="<?= site_url('front/ppllist/') ?>">Semua</a></li>
            <li><a href="<?= site_url('front/pplstatus/') ?>">Status Pendaftaran</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Kegiatan</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="<?= site_url('front/postinganlist/') ?>">Semua</a></li>
            <li class="dropdown"><a href="#"><span>Tahun</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <?php foreach ($tahun as $t) { ?>
                  <li><a href="<?= site_url('front/postinganlisttahun/' . $t) ?>"><?= $t; ?></a></li>
                <?php } ?>
              </ul>
            </li>
          </ul>
        </li>

        <?php if ($this->session->userdata('role')) { ?>
          <?php if ($this->session->userdata('role') == 'Anggota') { ?>
            <li><a class="nav-link scrollto" href="<?= site_url('forum/indexfgd') ?>">FGD</a></li>
            <li><a class="nav-link scrollto" href="<?= site_url('anggota/postingan') ?>">Admin Page</a></li>
          <?php } else { ?>
            <li><a class="nav-link scrollto" href="<?= site_url('anggota/logout') ?>">Logout</a></li>
          <?php } ?>
        <?php } else { ?>
          <li><a class="nav-link scrollto" href="<?= site_url('anggota/login') ?>">Login</a></li>
        <?php } ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->