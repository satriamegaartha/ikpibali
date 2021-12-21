<?php $this->load->view('front/_partials/head') ?>

<body>
    <?php $this->load->view('front/_partials/navbar') ?>

    <section id="pricing" class="pricing">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h2>Detail Forum</h2>
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
                            <div class="row ">
                                <div class="col-11"></div>
                                <div class="col-1">
                                    <button class="btn btn-primary" id="btn-komentar-utama"><i class="fas fa-comments"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    <form action="<?= site_url('forum/addkomentarfgd') ?>" method="POST" style="margin-top:10px;display:none;" id="komentar-utama">
                                        <input type="hidden" name="id_forumfgd" value="<?= $forum_fgd["id_forumfgd"] ?>">
                                        <input type="hidden" name="parent" value="0">
                                        <textarea name="konten" rows="4" class="form-control"></textarea>
                                        <input type="submit" class="btn btn-primary btn-sm mt-1" style="float: left;" value="Kirim">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- KOMENTAR -->
                <!-- KOMENTAR -->
                <!-- KOMENTAR -->
                <!-- KOMENTAR -->
                <!-- KOMENTAR -->

                <div class="col-lg-12 col-md-12 aos-init aos-animate mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <h3>Komentar</h3>
                        <div class="container p-0">
                            <?php foreach ($komentar_fgd as $k) : ?>
                                <!-- komentar parent -->
                                <div class="row">
                                    <div class="col-1">
                                        <img class="img-thumbnail" width="100px;" src="<?= base_url('anggota/' . $k["profileuser"]) ?>">
                                    </div>
                                    <div class="col-11">
                                        <?php if ($k["id_user"] == $id_login) { ?>
                                            <a href="<?php echo site_url('forum/deletekomentarparentfgd/' . $k["id_komentarfgd"]) ?>" style="float:right;" class="text-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Komentar Ini ?');"><i class="fas fa-trash"></i></a>
                                        <?php } ?>
                                        <p style="text-align:justify; font-size:1em; margin:0;"><strong><?= $k["namauser"]; ?></strong> </p>
                                        <p style="text-align:justify; font-size:0.8em;" class="mb-1"><?= date('d F Y', strtotime($k["created_at"])); ?></p>
                                        <p style="text-align:justify;"><?= $k["konten"] ?> </p>
                                    </div>
                                </div>

                                <!-- reply -->
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-10" style="padding-right: 0;">
                                        <h4 style="text-align:justify; font-size:1em; margin:0;">Reply</h4>
                                        <form action="<?= site_url('forum/addkomentarfgd') ?>" method="POST">
                                            <input type="hidden" name="id_forumfgd" value="<?= $forum_fgd["id_forumfgd"] ?>">
                                            <input type="hidden" name="parent" value="<?= $k["id_komentarfgd"] ?>">
                                            <input type="text" name="konten" class="form-control form-control-sm"></input>
                                    </div>
                                    <div class="col-1" style="padding-left: 0; margin-top: 1.2em;">
                                        <button type="submit" class="btn btn-sm btn-primary" style="float: left;" value="Submit"><i class="fas fa-reply"></i> Reply</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- balasan -->
                                <div class="row mt-4">
                                    <div class="col-1"></div>
                                    <div class="col-11">
                                        <?php foreach ($komentar_fgd_child as $kc) : ?>
                                            <?php if ($kc["parent"] == $k["id_komentarfgd"]) { ?>
                                                <div class="row">
                                                    <div class="col-2">
                                                        <p style="text-align:justify; font-size:1em; margin:0;"><strong><?= $kc["namauser"]; ?></strong> </p>
                                                        <p style="text-align:justify; font-size:0.8em;" class="mb-3"><?= date('d F Y', strtotime($kc["created_at"])); ?></p>
                                                    </div>
                                                    <div class="col-9">
                                                        <p style="text-align:justify;"><?= $kc["konten"] ?> </p>
                                                    </div>
                                                    <div class="col-1">
                                                        <?php if ($kc["id_user"] == $id_login) { ?>
                                                            <a href="<?php echo site_url('forum/deletekomentarfgd/' . $kc["id_komentarfgd"]) ?>" style="float:right;" class="text-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Komentar Ini ?');"><i class="fas fa-trash"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <hr class="mb-5">
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <?php $this->load->view('front/_partials/footer') ?>