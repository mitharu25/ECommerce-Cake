<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;">
        <a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a>
        <a href="<?= base_url('produk'); ?>" style="color:lavender;">/ Product</a>
        <a href="<?= base_url('/produks/' . $kue['jenis']); ?>" style="color:lavender;">/ <?= $kue['jenis']; ?></a>
        <a href="<?= base_url('/produks/' . $kue['jenis'] . '/' . $kue['kategori']); ?>" style="color:lavender;">/ <?= $kue['kategori']; ?></a>
        <span style="color:lime;">/ <?= $kue['nama']; ?></span>
    </h5>
</section>

<main id="main">
    <section class="section cta-section" style="padding: 0rem 0; background-color:aliceblue;">
        <div class="container">
            <div class="row">
                <div class="col col-6 mb-3">
                    <div class="carousel-wrap">
                        <div id="carouselsliderdemo" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/image/upload/kue/<?= $kue['gambar']; ?>" class="d-block w-100">
                                </div>
                                <?php foreach ($pictures as $index => $picture) : ?>
                                    <?php if (!empty($picture['file']) && $index < 4) : ?>
                                        <div class="carousel-item">
                                            <img src="/image/upload/pictures/<?= $picture['file']; ?>" class="d-block w-100">
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- Indicator start -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselsliderdemo" class="active img-thumbnail" data-bs-slide-to="0">
                                    <img src="/image/upload/kue/<?= $kue['gambar']; ?>" alt="" class="d-block w-100">
                                </button>
                                <?php foreach ($pictures as $index => $picture) : ?>
                                    <?php if (!empty($picture['file']) && $index < 4) : ?>
                                        <button type="button" data-bs-target="#carouselsliderdemo" class="img-thumbnail" data-bs-slide-to="<?= $index + 1 ?>">
                                            <img src="/image/upload/pictures/<?= $picture['file']; ?>" alt="" class="d-block w-100">
                                        </button>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- Indicator Close -->

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselsliderdemo" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselsliderdemo" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- Carousel Close -->
                    </div>
                    <!-- Carousel wrap Close -->
                </div>
                <!-- end col -->

                <div class="col col-6 mt-2">
                    <h2 style="color:black;"><b><?= $kue['nama']; ?></b> <i class="bx bxs-cookie" style="color:crimson ;"></i></h2>
                    <h4 style="color: green;">Rp <?= number_format($kue['harga'], 0, ',', '.'); ?></h4>
                    <br>
                    <h5>Waktunya menikmati <b><?= $kue['jenis']; ?></b> dalam kemasan <b><?= $kue['kategori']; ?></b></h5>
                    <br>
                    <form action="<?= site_url('cart/add'); ?>" method="post">
                        <label for="quantity" class="label1">Masukkan Jumlah : </label>
                        <input name="quantity" type="quantity" class="quantity-text" id="quantity" onfocus="if(this.value == '1') { this.value = ''; }" onblur="validateQuantity(this)" value="1" min="1">
                        <input type="hidden" name="id_kue" value="<?= $kue['id_kue']; ?>">
                        <input type="hidden" name="nama" value="<?= $kue['nama']; ?>">
                        <input type="hidden" name="harga" value="<?= $kue['harga']; ?>">
                        <input type="hidden" name="gambar" value="<?= $kue['gambar']; ?>">
                        <input type="submit" class="button1" value="Tambahkan Pesanan!">
                    </form>
                    <br><br>
                    <div class="d-grid gap-2">
                        <!-- <button class="btn" style="background-color:yellow; color:black;" type="button"><b>Tambahkan Keranjang</b> <i class="bx bxs-cart" style="color:black ;"></i></button> -->
                        <a role="button" href="https://wa.me/6285708958629" target="_blank" class="btn btn-primary" style="background-color: #25d366; color:white;" type="button"><b>Tanya Admin </b><i class="bi bi-whatsapp" style="color:white ;"></i></a>
                    </div>
                    <br>
                </div>
                <!-- end col -->
            </div>
        </div>
        <script>
            function validateQuantity(input) {
                if (input.value === '' || input.value < 1) {
                    input.value = 1;
                }
            }
        </script>
    </section>

    <section style="margin-bottom: 20px;">
        <div class="container">
            <div class="row">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#deskripsi" type="button" role="tab" aria-controls="deskripsi" aria-selected="true"><b>Deskripsi</b></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tambahan" type="button" role="tab" aria-controls="tambahan" aria-selected="false"><b>Informasi Tambahan</b></button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="home-tab">
                        <h6>Biasakan membaca deskripsi sebelum order</h6>
                        <h6> - </h6>
                        <h6><?= $kue['deskripsi']; ?></h6>
                        <h6> - </h6>
                        <p style="color: black;">Mengenai Kebijakan Pengembalian Produk Wulan Cookies official, Khususnya untuk kerusakan produk akibat kelalaian jasa pengiriman TIDAK menjadi tanggung jawab kami, dan kami tidak menerima retur barang atau pengembalian uang untuk masalah ini. Tetapi kami akan bantu follow up ke pihak Ekspedisi Untuk proses klaim apabila memang Terbukti kelalaian ada di pihak perusahaan ekspedisi. dan konsumen pada saat menerima produk yang rusak wajib memfoto Produk , mengkonfirmasikan kepada kurir yang mengirim, dan produk jangan digunakan dulu dan disimpan sebagai alat bukti. Terimakasih</p>
                    </div>
                    <div class="tab-pane fade" id="tambahan" role="tabpanel" aria-labelledby="profile-tab">
                        <h6>Jenis : <?= $kue['jenis']; ?></h6>
                        <p></p>
                        <h6>Kategori : <?= $kue['kategori']; ?></h6>
                        <p></p>
                        <h6>Berat : <?= $kue['berat']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section" style="background-color:aliceblue;" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="line-dc mb-2"></div>
                    <h3>Produk Lainnya</h3>
                </div>
                <?php
                shuffle($kue2);
                for ($i = 0; $i < min(count($kue2), 4); $i++) {
                    $k = $kue2[$i];
                ?>
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
                <?php } ?>
            </div>
        </div>
        </div>
    </section>
</main>

<!-- Modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->getFlashdata('showModal')) : ?>
            var modal = new bootstrap.Modal(document.getElementById('cartModal'));
            modal.show();
        <?php endif; ?>
    });
</script>
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Berhasil ditambahkan, silakan cek keranjang belanja ! </h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>