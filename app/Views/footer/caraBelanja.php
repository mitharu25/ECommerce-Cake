<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;">
        <a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a>
        <span style="color:lime;">/ Cara Belanja</span>
    </h5>
</section>

<main id="main">
    <section class="section cta-section" style="display: flex; padding: 0rem 0; background-color:whitesmoke;">
        <div class="container mx-auto mt-4 mb-4">
            <div class="row">
                <div class="col-7" style="background-color: white;" data-aos="fade-right">
                    <br>
                    <div class="accordion" id="accordionExample">
                        <h3 align="center" style="color: black;"><b>Keranjang</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Mengambil Produk
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    Pilih menu "Product" di bagian atas navbar (bisa pilih sesuai kategori), klik produk nya masuk menu, tambahkan jumlah nya dan klik "TAMBAHKAN PESANAN!".
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Keranjang Belanja
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    Pilih menu "Keranjang Saya" disitu akan membuka menu yang muncul di layar kanan, anda bisa edit atau menghapus dari keranjang belanja.
                                </div>
                            </div>
                        </div>
                        <hr style="border: 0; height: 2px; background-color: black;">
                        <h3 align="center" style="color: black;"><b>Checkout & Transaksi</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Checkout
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    Tekan tombol bertuliskan "Checkout". Lalu masukan nama, nomor telepon (disarankan aktif aplikasi WhatsApp), dan alamat yang dituju (disarankan lengkap). Jika semua sudah benar dan terlebih dahulu diperiksa keranjang belanja, lalu tekan tombol "Pesan Sekarang".
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Transaksi & Pembayaran
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                                <div class="accordion-body">
                                    Transaksi dilakukan setelah sudah melakukan checkout. Transaksi bisa memilih pembayaran nya dengan metode yang ada, jika sudah mentransaksi silakan kirim bukti pembayaran nya (bisa melalui file gambar/pdf).
                                </div>
                            </div>
                        </div>
                        <hr style="border: 0; height: 2px; background-color: black;">
                        <h3 align="center" style="color: black;"><b>Bantuan</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Customer Service
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
                                <div class="accordion-body">
                                    Jika terjadi kendala dalam akun, pemesanan, dan transaksi. Jangan sungkan menghubungi kami (Contact Us), kami akan melayani dan membantu apapun masalah nya dengan penuh kekeluargaan.
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