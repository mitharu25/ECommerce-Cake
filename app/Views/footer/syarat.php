<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;">
        <a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a>
        <span style="color:lime;">/ Syarat & Ketentuan</span>
    </h5>
</section>

<main id="main">
    <section class="section cta-section" style="display: flex; padding: 0rem 0; background-color:whitesmoke;">
        <div class="container mx-auto mt-4 mb-4">
            <div class="row">
                <div class="col-7" style="background-color: white;" data-aos="fade-right">
                    <br>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <h3 align="center" style="color: black;"><b>Akun</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Register
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    Setiap pembeli harus memiliki akun, jika belum punya maka bisa register akun melalui tombol login -> Daftar. Jika sudah memasuki silahkan isi data diri.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Login
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    Login harus dilakukan setiap ingin memesan produk kue, login dilakukan pada tekan tombol login saja. Setiap user login akan memiliki data pemesanan yang berbeda, untuk itu harap ingat username & password. Jika ada kendala bisa hubungi admin.
                                </div>
                            </div>
                        </div>
                        <hr style="border: 0;height: 2px;background-color: black;">
                        <h3 align="center" style="color: black;"><b>Lainnya</b></h3>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    Ketentuan Akun
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    Jika kami melihat user akun yang tidak serius atau memiliki data tidak valid, maka kami akan melakukan penghapusan user tersebut.
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-1"></div>
                <div class="col-4" data-aos=" fade-left">
                    <div class="container" style="background-color: white; padding: 20px;">
                        <h3 align="center" style="color: black;"><b>Informasi</b></h3>
                        <hr style="border: 0;height: 5px;background-color: blue;">
                        <br>
                        <h5 style="margin-left: 30px;"><a href="<?= base_url('/about'); ?>" style="color: blue;">↬ Tentang Kami</a></h5>
                        <h5 style="margin-left: 30px;"><a href="<?= base_url('/syarat'); ?>" style="color: blue;">↬ Syarat & Ketentuan</a></h5>
                        <h5 style="margin-left: 30px;"><a href="<?= base_url('/kontak'); ?>" style="color: blue;">↬ Kontak Kami</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    import {
        Collapse,
        initMDB
    } from 'mdb-ui-kit';

    initMDB({
        Collapse
    });
</script>

<?= $this->endSection(); ?>