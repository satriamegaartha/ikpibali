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
                    <div class="box" style="text-align:left;">
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-12">
                                    <form action="<?php echo site_url('forum/addforumfgd') ?>" method="post">

                                        <div class="form-group">
                                            <label for="id_peraturan" class="mb-2"><strong>Judul Peraturan</strong></label>
                                            <select name="id_peraturan" class="form-control" id="">
                                                <?php foreach ($peraturan as $p) : ?>
                                                    <option value="<?= $p["id_peraturan"]; ?>"><?= $p["nama"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="" class="mb-2"><strong>Konten</strong></label>
                                            <textarea class="form-control" name="konten" id="konten" rows="10"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>



    <?php $this->load->view('front/_partials/footer') ?>