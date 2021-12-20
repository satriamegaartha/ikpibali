<?php $this->load->view('front/_partials/head') ?>

<body>
    <?php $this->load->view('front/_partials/navbar') ?>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Welcome to <span>IKPI Bali</span></h1>
            <h2>Ikatan Konsultan Pajak Indonesia Cabang Bali</h2>
        </div>
    </section><!-- End Hero -->




    <section id="team" class="team section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h3>STATUS PENDAFTARAN PPL <span>IKPI BALI</span></h3>
            </div>

            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga (Rp)</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pplstatus as $p) : ?>
                            <tr>
                                <th><a style="color: black;" href="<?php echo site_url('front/ppluserdetail/' . $p["id"]) ?>"><?= $i++; ?></a></th>
                                <td><a style="color: black;" href="<?php echo site_url('front/ppluserdetail/' . $p["id"]) ?>"><?= $p['nama']; ?></a></td>
                                <td><a style="color: black;" href="<?php echo site_url('front/ppluserdetail/' . $p["id"]) ?>"><?= number_format($p['harga_pendaftaran'], 0, ',', '.'); ?></a></td>
                                <td><a style="color: black;" href="<?php echo site_url('front/ppluserdetail/' . $p["id"]) ?>"><?= date('d M Y', strtotime($p['tanggal_daftar'])); ?></a></td>
                                <td><a style="color: black;" href="<?php echo site_url('front/ppluserdetail/' . $p["id"]) ?>"><?= $p['status_pembayaran']; ?></a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>

        </div>
    </section>
    <?php $this->load->view('front/_partials/footer') ?>