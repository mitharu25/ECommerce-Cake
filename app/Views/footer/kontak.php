<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;">
        <a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a>
        <span style="color:lime;">/ Contact Us</span>
    </h5>
</section>

<main id="main">
    <section class="section cta-section" style="display: flex; padding: 0rem 0; background-color:white;">
        <div class="container mx-auto mt-4 mb-4">
            <div class="row" data-aos="fade-up">
                <h3 align="center">Jalin komunikasi dengan kami, <span style="color: green;">Ayo hubungi sekarang juga !</span></h3>
                <hr>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 18rem" style="background-color:black;">
                                <hr style="border-width: 5px;">
                                <img src="<?= base_url('image/footer/wa.png'); ?>" style="width: 100px; height: auto;" class="card-img-top mx-auto" alt="...">
                                <div class="card-body">
                                    <hr>
                                    <h5><b>WhatsApp</b></h5>
                                    <br>
                                    <h6>Admin WhatsApp</h6>
                                    <h6>0857-0895-8629</h6>
                                    <h6>&nbsp;</h6>
                                </div>
                                <hr style="border-width: 5px;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem" style="background-color:black;">
                                <hr style="border-width: 5px;">
                                <img src="<?= base_url('image/footer/gmail.png'); ?>" style="width: 100px; height: auto;" class="card-img-top mx-auto" alt="...">
                                <div class="card-body">
                                    <hr>
                                    <h5><b>Email</b></h5>
                                    <br>
                                    <h6> WULAN Cookies & Cake </h6>
                                    <h6> WLNCookiesCake@gmail.com </h6>
                                    &nbsp;
                                </div>
                                <hr style="border-width: 5px;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem" style="background-color:black;">
                                <hr style="border-width: 5px;">
                                <img src="<?= base_url('image/footer/market.png'); ?>" style="width: 100px; height: auto;" class="card-img-top mx-auto" alt="...">
                                <div class="card-body">
                                    <hr>
                                    <h5><b>Place Market</b></h5>
                                    <br>
                                    <h6>Jalan Kembar Palem II blok Y No.03, Soreang Indah. Kab.Bandung</h6>
                                </div>
                                <hr style="border-width: 5px;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem" style="background-color:black;">
                                <hr style="border-width: 5px;">
                                <img src="<?= base_url('image/footer/phone.png'); ?>" style="width: 100px; height: auto;" class="card-img-top mx-auto" alt="...">
                                <div class="card-body">
                                    <hr>
                                    <h5><b>Phone</b></h5>
                                    <br>
                                    <h6>Ibu Pemilik UMKM Penjualan Kue</h6>
                                    <h6>0857-0895-8629</h6>
                                </div>
                                <hr style="border-width: 5px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>

<?= $this->endSection(); ?>