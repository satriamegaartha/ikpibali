<?php $this->load->view('front/_partials/head') ?>

<body>
    <?php $this->load->view('front/_partials/navbar') ?>
    <section id="team" class="team section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h3>Point Partisipasi Event <span>IKPI BALI</span></h3>
            </div>

            <div class="row">
                <div class="col-2">
                    <form action="<?php echo site_url('front/indexpoint/') ?>" method="post">
                        <div class="form-group">
                            <select name="tahun_select" class="form-control">
                                <option value="" disabled selected>Pilih Tahun</option>
                                <?php foreach ($tahun_point as $thn) : ?>
                                    <option value="<?= $thn; ?>" <?= ($thn == $tahun_select) ? "selected" : "" ?>><?= $thn; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $jumlah = 0; ?>
                        <?php foreach ($point_terstruktur as $p) : ?>
                            <?php $jumlah = $jumlah + $p["point"] ?>
                            <tr>
                                <th><?= $i++; ?></th>
                                <td><?= date('d M Y', strtotime($p['tanggal'])); ?></td>
                                <td><?= $p['namappl']; ?></td>
                                <td><?= $p["point"]; ?></td>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <th colspan="3" style="text-align: right;">Jumlah</th>
                            <th><?= $jumlah; ?></th>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </section>
    <?php $this->load->view('front/_partials/footer') ?>