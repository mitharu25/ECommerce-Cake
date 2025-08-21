<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;"><a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a> <span style="color:lime;">/ Product</span></h5>
</section>

<main id="main">

    <section class="section cta-section" style="padding: 0rem 0; background-color:aliceblue;">
        <div class="container mx-auto mt-4">
            <div class="row" data-aos="fade-up">
                <?php
                $i = 1;
                foreach ($kue as $k) :
                ?>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up">
                        <div class="card2 card2-block" style="background-color:rgb(189, 204, 180)whitesmoke;">
                            <a href="<?= site_url('/produk/' . $k['slug']); ?>">
                                <img class="img2" src="/image/upload/kue/<?= $k['gambar']; ?>" alt="Gambar Kue">
                                <h5 class="card2-title mt-3 mb-2" align="center"><b><?= $k['nama']; ?></b></h5>
                                <p class="card2-text" style="height: 30px; color:black;" align="center">
                                    Rp <?= number_format($k['harga'], 0, ',', '.'); ?>
                                    <div class="d-grid gap-2">
                                        <a href="<?= site_url('/produk/' . $k['slug']); ?>" class="btn btn-outline-warning btn-sm" style="background:lightblue; color:blue; border-radius: 20px;" type="button"><b>Lihat Produk ↪</b></a>
                                    </div>
                                </p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?= $this->endSection(); ?>