<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="hero-section" id="hero">

    <div class="wave">
        <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="whitesmoke">
                    <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
                </g>
            </g>
        </svg>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 hero-text-image">
                <div class="row">
                    <div class="col-lg-16 text-center text-lg-start">
                        <h1 data-aos="fade-up" align="center">Tentang Kami</h1>
                        <p class="mb-5" data-aos="fade-up" data-aos-delay="100" align="center">WE ARE HERE SINCE 2010</p>
                        <hr class="hrtotal" data-aos="fade-up" data-aos-delay="100" style="border-width: 6px; color:gold;">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<main id="main">
    <section class="section" style="background-color:whitesmoke;">
        <div class="container">
            <div class="row" style="margin-bottom: 20px;" data-aos="fade-right">
                <div class="image3-text-container">
                    <div class="image3">
                        <img src="<?= base_url('image/img/mades.jpeg'); ?>" width="1700px" alt="Gambar">
                    </div>
                    <div class="text3">
                        <h2 align="left"><b>Sejarah Wulan Cookies and Cake</b></h2>
                        <h5 align="left">Keluarga & Teman Bersama</h5>
                        <hr class="hrtotal">
                        <p align="center" style="color:black; text-align: justify;">
                            Kemampuan usaha kami berupaya untuk berinovasi menciptakan produk baru, pada tahun 2010 memulai nya dalam penjualan dalam skala kecil dan tertentu. Tahun ke tahun kami sudah memulai perkembangan bisnis yang tentunya dibantu oleh kerabat dan keluarga dalam ikut serta membangun sebuah usaha kecil di bidang makanan termasuk kue kering dan basah.
                            Semoga kami memberikan layanan produk terbaik.
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row" data-aos="fade-left">
                <div class="image4-text-container">
                    <div class="text4">
                        <h2 align="left"><b>Homemade Cookies</b></h2>
                        <h5 align="left">Dibuat Oleh Tangan Tangan Ahli</h5>
                        <hr class="hrtotal">
                        <p align="center" style="color:black; text-align: justify;">
                            Perusahaan kami percaya bahwa kenikmatan kue kering adalah dari penggunaan bahan-bahan halal dan berkualitas. Selain itu, cara pembuatan yang masih tradisional dengan menggunakan tangan atau handmade, semakin memberi nilai jual yang unik dan otentik pada produk kami. Sertifikat PIRT serta Halal telah diresmikan pada tahun 2023 lalu dengan nomor sebagai berikut :
                        </p>
                        <p align="center" style="color:black; text-align: justify;">PIRT : <b>2053204011229-27</b></p>
                        <p align="center" style="color:black; text-align: justify;">HALAL : <b>ID32110000644750922</b></p>
                    </div>
                    <div class="image4">
                        <img src="<?= base_url('image/img/homes.jpeg'); ?>" alt="Gambar">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section cta-section" style="background-color:rgb(55, 55, 55); padding: 2rem 0;">
        <div class="container">
            <h1 align="center" style="color: gold;">WULAN COOKIES and CAKE</h1>
            <br>
            <h2 align="center" style="color: rgb(135, 206, 235);">----------------</h2>
        </div>
    </section>
</main>
<?= $this->endSection(); ?>