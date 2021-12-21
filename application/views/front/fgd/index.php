<?php $this->load->view('front/_partials/head') ?>

<body>
    <?php $this->load->view('front/_partials/navbar') ?>
    <section id="pricing" class="pricing">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h2>Forum</h2>
                <h3>FGD <span>IKPI Bali</span></h3>
            </div>
            <a class="btn btn-primary btn-sm mb-2" href="<?= site_url('forum/tambahforumfgd/') ?>">Forum Baru</a>
            <div class="row">
                <?php foreach ($forum_fgd as $f) : ?>
                    <div class="col-lg-12 col-md-12 aos-init aos-animate mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="box">
                            <div class="container p-0">
                                <div class="row">
                                    <div class="col-1">
                                        <a href="<?php echo site_url('forum/detailfgd/' . $f["id_forumfgd"]) ?>" style="padding:0; color:#444444;">
                                            <img class="img-thumbnail" width="100px;" src="<?= base_url('anggota/' . $f["profileuser"]) ?>">
                                        </a>
                                    </div>
                                    <div class="col-11">
                                        <a href="<?php echo site_url('forum/detailfgd/' . $f["id_forumfgd"]) ?>" style="padding:0; color:#444444;">
                                            <h4 style="text-align:left; color:#444444; font-size:1.5em; margin:0;"><?= $f["judul"]; ?></h4>
                                            <p style="text-align:justify; font-size:0.8em;"><?= $f["namauser"]; ?> | <?= date('d F Y', strtotime($f["created_at"])); ?></p>
                                            <p style="text-align:justify; margin:0;"><?= substr($f["konten"], 0, 250); ?> ... </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section>



    <?php $this->load->view('front/_partials/footer') ?>