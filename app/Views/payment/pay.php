<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;"><a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a> <span style="color:lime;">/ Checkout</span></h5>
</section>

<main id="main">

    <section class="section cta-section" style="padding: 0rem 0; background-color:white;">
        <div class="container mx-auto mt-4 mb-3">
            <div class="row">
                <h2 style="color: darkgreen; font-size: 2rem;">Checkout Pemesanan</h2>
                <hr>
                <form action="<?= base_url('/order') ?>" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nama" class="form-label" style="color: black;"><b>Nama Lengkap</b></label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama.." value="<?= session('fullname') ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="phone" class="form-label" style="color: black;"><b>Nomor Telepon (Aktif WA)</b></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="masukan no. Hp.." value="<?= session('phone') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label" style="color: black;"><b>Alamat Tujuan Pengiriman</b></label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" style="width:100%; height:60px;" placeholder="masukan alamat.." required><?= session('alamat') ?></textarea>
                    </div>
                    <p style="color: blue;"><b>Note : Data diatas bisa dirubah</b></p>
                    <!-- <hr style="border: 2px solid black; height: 2px; background-color: black;"> -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="produk" class="form-label" style="color: black;"><b>List Produk</b></label>
                                <textarea name="produk" id="produk" readonly style="width:100%; height:225px; background-color:whitesmoke;"><?= esc($listorder); ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="payment-background mb-3" style="background-color:#654321;">
                                <p>#===============================================================#</p>
                                <?php $totalitem = 0; ?>
                                <?php $totalHarga = 0; ?>
                                <?php foreach ($cart as $id => $item) : ?>
                                    <?php $totalitem += $item['quantity'] ?>
                                    <?php $totalHarga += $item['harga']; ?>
                                <?php endforeach; ?>
                                <h6 style="color: white;" align="left">Jumlah Item : <?= $totalitem; ?></h6>
                                <h6 style="color: white;" align="left">Total Harga &nbsp;&nbsp;: Rp <?= number_format($totalHarga, 0, ',', '.'); ?></h6>
                                <hr>
                                <input type="hidden" name="id_user_konsumen" value="<?= session('id_konsumen') ?>">
                                <input type="hidden" name="total_harga" value="<?= $totalHarga; ?>">
                                <input type="hidden" name="total_produk" value="<?= $totalitem; ?>">
                                <?php if (empty(session()->get('cart'))) : ?>
                                    <div class="d-grid gap-2 mb-3">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#konfirmasi" class="btn btn-warning" style="background-color:yellowgreen; color:black;" disabled><b>>> Pesan Sekarang << </b></button>
                                    </div>
                                <?php else : ?>
                                    <div class="d-grid gap-2 mb-3">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#konfirmasi" class="btn btn-warning" style="background-color:yellowgreen; color:black;"><b>>> Pesan Sekarang << </b></button>
                                    </div>
                                <?php endif; ?>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <hr style="border: 2px solid black; height: 2px; background-color: black;">
                    <p style="color: orange;"><b>Note : Total Harga diatas tidak termasuk biaya pengiriman kurir, biaya pengiriman ditanggung pembeli secara COD (Cash On Delivery). Jika terjadi sesuatu silahkan hubungi admin</b></p>
            </div>
        </div>
    </section>
    <div class="modal fade" id="konfirmasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="konfirmasi" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="konfirmasi"><b>Konfirmasi</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Apakah anda yakin?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning btn-sm">Iya</button>
                </div>
            </div>
        </div>
    </div>
    </form>

</main>

<?= $this->endSection(); ?>