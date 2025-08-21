<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;">
        <a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a>
        <span style="color:lime;">/ Konfirmasi Pembayaran</span>
    </h5>
</section>

<main id="main">
    <section class="section cta-section" style="display: flex; padding: 0rem 0; background-color:whitesmoke;">
        <div class="container mx-auto mt-4 mb-4">
            <div class="row">
                <div class="col-7" style="background-color: white;" data-aos="fade-right">
                    <br>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <h3 align="center" style="color: black;"><b>Status Pembayaran</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Pre Transaction
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    Sesudah melakukan checkout, status pemesanan akan bertuliskan "Menunggu Transaksi". Artinya pembeli harus melakukan transaksi (berserta mengirim bukti pembayaran) terlebih dahulu sebelum dikonfirmasi oleh admin. Tentu nya admin pengecekan, jika ada masalah jangan sungkan menghubungi admin.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Menunggu Konfirmasi
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    Status "Menunggu Konfirmasi" Jika sudah melakukan upload bukti pembayaran maka akan menunggu admin untuk mengecek nya, jika ada masalah jangan sungkan menghubungi admin.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    Confirmed & Sending
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    Status ini artinya pemesanan dikonfirmasi dan sedang dalam perjalanan pengiriman ke alamat tujuan.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                    Arrived
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                                <div class="accordion-body">
                                    Status ini artinya pemesanan telah sampai ke tujuan.
                                </div>
                            </div>
                        </div>
                        <hr style="border: 0; height: 2px; background-color: black;">
                        <h3 align="center" style="color: black;"><b>Bantuan</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                    Customer Service
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
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