<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section class="hero-section" id="hero">

    <div class="wave">

        <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                    <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
                </g>
            </g>
        </svg>

    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 hero-text-image">
                <div class="row">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 data-aos="fade-right">Kue Homemade Selalu Istimewa Keluarga </h1>
                        <p class="mb-5" data-aos="fade-right" data-aos-delay="100">#Sajikan Acara Keluarga Lebih Meriah dengan Kue Pilihan Kami!</p>
                    </div>
                    <div class="col-lg-4 iphone-wrap">
                        <img src="<?= base_url('image/img/slice_cake.png'); ?>" alt="Image" class="phone-1" data-aos="fade-right">
                        <img src="<?= base_url('image/img/wulan_logo2.png'); ?>" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Home Section ======= -->
    <!-- 1 -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-9" data-aos="fade-up">
                    <h2 class="section-heading">Nikmati Suasana Sesuai Dengan Selera Anda!</h2>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="featured-carousel owl-carousel">
                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(<?= base_url('image/img/kue4.jpeg'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(<?= base_url('image/img/kue1.jpeg'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(<?= base_url('image/img/kue2.jpeg'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(<?= base_url('image/img/kue3.jpeg'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(<?= base_url('image/img/kue5.jpeg'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- 2 -->
    <section class="section cta-section" style="background-color:rgb(100, 70, 40);">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-md-9 me-auto text-center text-md-start mb-5 mb-md-0">
                    <h2>Pesan & Nikmati Sekarang Juga <i class="bx bxs-cookie"></i></h2>
                </div>
                <div class="col-md-3 text-center text-md-end">
                    <p><a href="<?= base_url('produk'); ?>" class="btn d-inline-flex align-items-center"><i class="bx bxs-cake" style="color: white;"></i><span>Lihat Produk Lainnya </span><i class="bx bxs-chevrons-right"></i></a></p>
                </div>
            </div>
            <div class="row align-items-center" style="justify-content: center; margin-top: 40px;">
                <div class="row" data-aos="fade-down">
                    <div class="featured-carousel owl-carousel">
                        <?php
                        shuffle($kue);
                        for ($i = 0; $i < min(count($kue), 9); $i++) {
                            $k = $kue[$i];
                        ?>
                            <div class="item">
                                <div class="work">
                                    <div class="card2 mt-2 card2-block" style="background-color:rgb(189, 204, 180)whitesmoke;">
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
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </section>

    <!-- 3 -->
    <section class="section">
        <div class="container">
            <div class="row" style="margin-bottom: 20px;" data-aos="fade-right">
                <div class="image3-text-container">
                    <div class="image3">
                        <img src="<?= base_url('image/img/handmade.jpg'); ?>" alt="Gambar" width="2000px">
                    </div>
                    <div class="text3">
                        <h2 align="center"><b>Handmade Terbaik!</b></h2>
                        <p align="center" style="color:black;">Di sini di <b><span style="color: yellowgreen;">WULAN COOKIES & CAKE</span></b>, kami bangga menyajikan karya-karya handmade terbaik yang memberikan sentuhan kreatif dan kualitas tinggi. Setiap produk kami dirancang dengan cinta dan perhatian terhadap detail, mencerminkan keahlian tangan yang mengagumkan. Dari kerajinan unik hingga hadiah spesial, setiap item di koleksi kami memiliki cerita sendiri dan akan memberikan pengalaman istimewa kepada Anda atau orang yang Anda cintai. Temukan keajaiban handmade kami dan biarkan kami mempersembahkan yang terbaik untuk Anda!</p>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-left">
                <div class="image4-text-container">
                    <div class="text4">
                        <h2 align="center" style="color: blueviolet;"><b>Kebersihan Nomor 1!</b></h2>
                        <p align="center" style="color:black;">Kebersihan adalah aspek penting dalam menjaga kesehatan dan kenyamanan. Dengan lingkungan yang bersih, kita dapat mengurangi risiko penyebaran penyakit dan menciptakan tempat yang nyaman untuk tinggal dan bekerja. Selain itu, kebersihan juga mencerminkan sikap peduli terhadap diri sendiri dan orang lain. Dengan menjaga kebersihan diri dan lingkungan sekitar, kita berkontribusi pada kesehatan dan kesejahteraan bersama. </p>
                    </div>
                    <div class="image4">
                        <img src="<?= base_url('image/img/cuci-tangan.jpg'); ?>" alt="Gambar">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4 -->
    <section class="cta-section" style="background-color:whitesmoke;">
        <div class="container">
            <br>
            <div class="row" data-aos="fade-up">
                <h3 align="center"><b>WULAN COOKIES & CAKE Factory</b></h3>
                <h5 align="center">JL Kembar Palem II blok Y No 03, Soreang Indah. Kab.Bandung</h5>
            </div>
            <br>
            <div class="row" data-aos="fade-up">
                <div class="map-container">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.8366335561936!2d107.53675937483638!3d-7.028480392973329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68ed675a6eb3c9%3A0x9b5541116451bb23!2sNicko&#39;s%20home!5e0!3m2!1sen!2sid!4v1713164137101!5m2!1sen!2sid" width="100%" height="400" style="border: 100px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>