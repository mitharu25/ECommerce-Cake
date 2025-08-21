<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;">
        <a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a>
        <span style="color:lime;">/ Informasi Pengiriman</span>
    </h5>
</section>

<main id="main">
    <section class="section cta-section" style="display: flex; padding: 0rem 0; background-color:whitesmoke;">
        <div class="container mx-auto mt-4 mb-4">
            <div class="row">
                <div class="col-7" style="background-color: white;" data-aos="fade-right">
                    <br>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <h3 align="center" style="color: black;"><b>Proses Pengiriman</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Kurir
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    Kurir yang mengantarkan paket pemesanan seringnya menggunakan GoSend, tentu semua ini tergantung wilayah dan jarak tempuh masing-masing alamat. Jika terjadi kendala dalam pengantaran paket pemesanan, jangan sungkan untuk hubungi kami.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Cash On Delivery
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    Semua biaya paket pengiriman ditanggung oleh penerima secara Cash On Delivery (COD), kami tidak akan meminta biaya tambahan kepada pembeli dalam perihal pengiriman paket pemesanan. Jika terjadi kendala dalam pembayaran kurir paket pemesanan, jangan sungkan untuk hubungi kami.
                                </div>
                            </div>
                        </div>
                        <hr style="border: 0;height: 2px;background-color: black;">
                        <h3 align="center" style="color: black;"><b>Bantuan</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    Customer Service
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    Jika terjadi kendala dalam akun, pemesanan, dan transaksi. Jangan sungkan menghubungi kami (Contact Us), kami akan melayani dan membantu apapun masalahnya dengan penuh kekeluargaan.
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-1"></div>
                <div class="col-4" data-aos="fade-left">
                    <div class="container" style="background-color: white; padding: 20px;">
                        <h3 align="center" style="color: black;"><b>Bantuan</b></h3>
                        <hr style="border: 0;height: 5px;background-color: blue;">
                        <br>
                        <h5 style="margin-left: 30px;"><a href="<?= base_url('/carabelanja'); ?>" style="color: blue;">↬ Cara Belanja</a></h5>
                        <h5 style="margin-left: 30px;"><a href="<?= base_url('/pembayaran'); ?>" style="color: blue;">↬ Konfirmasi Pembayaran</a></h5>
                        <h5 style="margin-left: 30px;"><a href="<?= base_url('/infopengiriman'); ?>" style="color: blue;">↬ Informasi Pengiriman</a></h5>
                        <h5 style="margin-left: 30px;"><a href="<?= base_url('/policy'); ?>" style="color: blue;">↬ Refund & Return Policy</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection(); ?>