<?php $this->load->view('front/_partials/head') ?>

<body>
    <?php $this->load->view('front/_partials/navbar') ?>

    <section id="pricing" class="pricing">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h2>Forum</h2>
                <h3>FGD <span>IKPI Bali</span></h3>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-12 aos-init aos-animate mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-1">
                                    <img class="img-thumbnail" width="100px;" src="<?= base_url('anggota/' . $forum_fgd["profileuser"]) ?>">
                                </div>
                                <div class="col-11">
                                    <h4 style="text-align:left; color:#444444; font-size:1.5em; margin:0;"><?= $forum_fgd["judul"]; ?></h4>
                                    <p style="text-align:justify; font-size:0.8em;"><?= $forum_fgd["namauser"]; ?> | <?= date('d F Y', strtotime($forum_fgd["created_at"])); ?></p>
                                    <p style="text-align:justify; margin:0;"><?= $forum_fgd["konten"] ?> </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>



    <?php $this->load->view('front/_partials/footer') ?>