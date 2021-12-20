<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Detail PPL</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('front/assets/img/favicon.png') ?>" rel="icon">
    <link href="<?= base_url('front/assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('front/assets/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('front/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('front/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('front/assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('front/assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('front/assets/css/style.css') ?>" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand - v3.6.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?php $this->load->view('front/_partials/navbar') ?>

    <main id="main" data-aos="fade-up">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Anggota</h2>
                </div>

            </div>
        </section><!-- Breadcrumbs Section -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                    <?php foreach ($anggota as $a) : ?>
                        <div class="col-lg-4">
                            <div class="portfolio-details-slider">
                                <div class="align-items-center">
                                    <img src="<?= base_url('anggota/' . $a->profile) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="portfolio-info">
                                <h3><?= $a->nama ?></h3>
                                <ul>
                                    <li><strong>Brevet</strong>: <?= $a->brevet ?></li>
                                    <li><strong>SK</strong>: <?= $a->sk ?></li>
                                    <li><strong>KIP</strong>: <?= $a->kip ?></li>
                                    <li><strong>Alamat</strong>: <?= $a->alamat ?></li>
                                    <li><strong>Email</strong>: <?= $a->email ?></li>
                                    <li><strong>No Telp</strong>: <?= $a->notelp ?></li>


                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('front/assets/vendor/aos/aos.js') ?>"></script>
    <script src="<?= base_url('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('front/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?= base_url('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('front/assets/vendor/php-email-form/validate.js') ?>"></script>
    <script src="<?= base_url('front/assets/vendor/purecounter/purecounter.js') ?>"></script>
    <script src="<?= base_url('front/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
    <script src="<?= base_url('front/assets/vendor/waypoints/noframework.waypoints.js') ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('front/assets/js/main.js') ?>"></script>

</body>

</html>