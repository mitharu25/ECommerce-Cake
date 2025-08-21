<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url('/image/img/wulan_logo.png'); ?>" rel="icon">
    <link href="<?php echo base_url('/image/img/wulan_logo.png'); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets_home/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets_home/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets_home/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets_home/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets_home/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets_home/css/style.css'); ?>" rel="stylesheet">

    <!-- Carousel -->
    <link rel="stylesheet" href="<?php echo base_url('css/carousel/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/carousel/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/carousel/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

    <!-- External -->
    <link rel="stylesheet" href="<?php echo base_url('css/css_card.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/cart.css'); ?>">

    <!-- Maps -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" /> -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1 style="color: yellow;"><img src="/image/img/wulan_logo.png" alt="" class="img-fluid"><a href="<?= base_url(); ?>" style="color: yellow; text-decoration: none;"> WULAN COOKIES & CAKE</a></h1>
            </div>

            <!-- Navbar -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active" href="<?= base_url(); ?>">Home</a></li>
                    <li class="dropdown"><a href="<?= base_url('produk'); ?>"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="<?= base_url('/produks/Kering'); ?>"><span>Kue Kering</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="<?= base_url('/produks/Kering/Reguler'); ?>">Kemasan Reguler</a></li>
                                    <li><a href="<?= base_url('/produks/Kering/JAR'); ?>">Kemasan JAR</a></li>
                                    <li><a href="<?= base_url('/produks/Kering/Kotak'); ?>">Kemasan Kotak</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="<?= base_url('/produks/Basah'); ?>"><span>Kue Basah</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="<?= base_url('/produks/Basah/BoxPlastik'); ?>">Kemasan Box Plastik</a></li>
                                    <li><a href="<?= base_url('/produks/Basah/Mini'); ?>">Kemasan Mini</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('/kontak'); ?>">Contact Us</a></li>
                    <li><a href="">||</a></li>
                    <?php if (session()->has('isLoggedIn')) : ?>
                        <li>
                            <a href="#" class="cartLink">
                                <div class="iconCart">
                                    <div class="totalQuantity"><?php echo count($cart); ?></div>
                                    &nbsp;
                                    <i class="bi bi-cart-fill"></i>
                                    &nbsp;Keranjang Saya
                                </div>
                            </a>
                        </li>
                        <li><a href="<?= base_url('/pesanan'); ?>"><i class="bi bi-bag-check-fill"></i>&nbsp;Pesanan Saya</a></li>
                        <!-- <li><a href=""><i class="bi bi-person-fill"></i>&nbsp;Profil Saya</a></li> -->
                        <li class="dropdown"><a href="#"><i class="bi bi-person-fill"></i><span>&nbsp;Profil Saya</span><i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="<?= base_url('/konsumen/profil'); ?>">Lihat Profil</a></li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal" style="color: red;"><b>LOGOUT</b><i class="bi bi-power"></i></a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <?php
                        $session = session();
                        $isAdmin = $session->get('role') === 'admin';
                        ?>
                        <?php if ($isAdmin) : ?>
                            <li>
                                <a href="<?= base_url('/admin/dashboard'); ?>" type="button" class="button-18" role="button" style="color: black;"><b>Kembali Halaman Admin >></b> &nbsp;&nbsp;&nbsp;</a>
                            </li>
                        <?php else : ?>
                            <li>
                                <button type="button" class="button-18" role="button" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN&nbsp;<i class="bi bi-box-arrow-in-right"></i></button>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- Keranjang -->
    <div class="cart">
        <h2>Keranjang</h2>
        <div class="listcart">
            <?php if (empty($cart)) : ?>
                <p>Keranjang belanja kosong.</p>
            <?php else : ?>
                <?php $totalHarga = 0; ?>
                <?php foreach ($cart as $id => $item) : ?>
                    <?php $harga = $item['xharga']; ?>
                    <?php $jumlah = $item['quantity']; ?>
                    <?php $total = $item['harga']; ?>
                    <?php $itemTotal = $item['quantity'] * $item['harga']; ?>
                    <?php $totalHarga += $item['harga']; ?>
                    <div class="item2">
                        <img src="<?= base_url('image/upload/kue/' . $item['gambar']); ?>" class="img2">
                        <div class="content">
                            <div class="name2">
                                <?= $item['nama']; ?>
                            </div>
                            <div class="price">
                                Rp <?= number_format($total, 0, ',', '.'); ?>
                            </div>
                            <div class="quantity">
                                <span class="value">Jumlah : <?= $jumlah; ?> pcs </span>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editCart<?= $id; ?>" style="border-radius: 5px; background-color:aliceblue;">Edit Jumlah</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#hapusCart<?= $id; ?>" style="background-color: red;"><i class="bx bx-trash" style="color:black ;"></i></button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!-- Modal Hapus Cart -->
                    <div class="modal fade" id="hapusCart<?= $id; ?>" tabindex="-1" aria-labelledby="hapusCart" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusCart">Notifikasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Hapus Pesanan <?= $item['nama']; ?> ?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                                    <a href="<?= site_url('cart/remove/' . $id); ?>" role="button" type="submit" class="btn btn-primary btn-sm">Ya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit Jumlah Cart -->
                    <div class="modal fade" id="editCart<?= $id; ?>" tabindex="-1" aria-labelledby="editCart" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCart">Notifikasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= site_url('cart/edit/' . $id); ?>" method="post">
                                        <input type="hidden" name="id_kue" value="<?= $id; ?>">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $item['quantity']; ?>" min="1" onkeydown="return false">
                                                    <label for="quantity"><b>Jumlah</b></label>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-warning btn-sm"><b>Simpan Perubahan</b></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="hargatotal">
                    <hr class="hrtotal">
                    <h5 class="hTotal">Total : Rp <?= number_format($totalHarga, 0, ',', '.'); ?></h5>
                    <hr class="hrtotal">
                </div>
            <?php endif; ?>
            <div class="buttons">
                <div class="close">↞ Tutup</div>
                <?php if (empty($cart)) : ?>
                    <div class="checkout" style="background-color: gray;" disabled>CHECKOUT</div>
                <?php else : ?>
                    <div class="checkout"><a href="<?= base_url('/payment'); ?>">CHECKOUT</a></div>
                <?php endif; ?>
            </div>
            <hr>
            <p style="color: orange;">Note : Jika ingin pesan silahkan tekan checkout</p>
        </div>
    </div>
    <!-- End Keranjang -->

    <!-- Modal From Controller -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('showModal2')) : ?>
                var modal = new bootstrap.Modal(document.getElementById('editJumlah'));
                modal.show();
            <?php endif; ?>
        });
    </script>
    <div class="modal fade" id="editJumlah" tabindex="-1" aria-labelledby="editJumlah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJumlah">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Pembaruan berhasil! Silahkan cek keranjang</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"></button>
                    <div class="centered-icon">
                        <i class="bi bi-person-circle" style="font-size: 70px; color:rgb(173, 208, 104);"></i>
                    </div>
                    <h3 align="center"><b>Login</b></h3>
                    <br>
                    <div class="form-container">
                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username" style="border: 1px solid #4b3b09;" required>
                                <label for="floatingUsername">Username</label>
                            </div>
                            <div class="form-floating password-toggle">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" style="border: 1px solid #4b3b09;" required>
                                <label for="floatingPassword">Password</label>
                                <i class="bi bi-eye-slash toggle-password"></i>
                            </div>
                            <br>
                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-sm btn-customSubmit" type="submit" value="Login">Submit</button>
                            </div>
                        </form>
                        <!-- <p align="right"><a href="#" class="lupa-pass">Forgot Password</a></p> -->
                        <p>&nbsp;</p>
                        <br>
                        <br>
                        <hr>
                        <p align="center" style="color: black;">Tidak punya akun? Silahkan <a role="button" style="color: blue;" data-bs-toggle="modal" data-bs-target="#modalDaftar" data-bs-dismiss="modal">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("floatingPassword");
            const togglePasswordButton = document.querySelector(".toggle-password");

            togglePasswordButton.addEventListener("click", function() {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    togglePasswordButton.classList.remove("bi-eye-slash");
                    togglePasswordButton.classList.add("bi-eye");
                } else {
                    passwordInput.type = "password";
                    togglePasswordButton.classList.remove("bi-eye");
                    togglePasswordButton.classList.add("bi-eye-slash");
                }
            });
        });
    </script>
    <!-- End Modal Login -->

    <!-- Modal Register -->
    <div class="modal fade" id="modalDaftar" aria-hidden="true" aria-labelledby="modalDaftar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"></button>
                    <h3 style="margin-top: 30px;" align="center"><b>Register Akun</b></h3>
                    <hr>
                    <div class="form-container">
                        <form action="<?= base_url('konsumen/register') ?>" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" placeholder="Fullname" style="border: 1px solid #4b3b09;" required>
                                <label for="fullname">Nama Lengkap</label>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" id="phone" placeholder="No. HP (Aktif WA)" name="phone" style="border: 1px solid #4b3b09;" required>
                                </div>
                                <div class="col">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" style="border: 1px solid #4b3b09;" required>
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control form-control-sm" placeholder="Alamat Tempat Tinggal" id="alamat" name="alamat" style="height: 100px; border: 1px solid #4b3b09;" required></textarea>
                                <label for="alamat">Alamat</label>
                            </div>
                            <br>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-sm" id="username" placeholder="Username" name="username" style="border: 1px solid #4b3b09;" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating password-toggle2">
                                <input type="password" class="form-control form-control-sm" id="floatingPassword2" placeholder="Password" name="password" style="border: 1px solid #4b3b09;" required>
                                <label for="floatingPassword2">Password</label>
                                <i class="bi bi-eye-slash toggle-password2"></i>
                            </div>
                            <br>
                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-sm btn-customSubmit" type="submit" value="Register">Submit</button>
                            </div>
                        </form>
                        <hr>
                        <p align="center" style="color: black;">Sudah punya akun, Silahkan kembali ke <a role="button" style="color: blue;" data-bs-target="#loginModal" data-bs-toggle="modal" data-bs-dismiss="modal">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("floatingPassword2");
            const togglePasswordButton = document.querySelector(".toggle-password2");

            togglePasswordButton.addEventListener("click", function() {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    togglePasswordButton.classList.remove("bi-eye-slash");
                    togglePasswordButton.classList.add("bi-eye");
                } else {
                    passwordInput.type = "password";
                    togglePasswordButton.classList.remove("bi-eye");
                    togglePasswordButton.classList.add("bi-eye-slash");
                }
            });
        });
    </script>
    <!-- End Modal Register -->

    <!-- Modal Alert -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('showModalRegister')) : ?>
                var modal = new bootstrap.Modal(document.getElementById('registerSuccess'));
                modal.show();
            <?php endif; ?>
        });
    </script>
    <div class="modal fade" id="registerSuccess" tabindex="-1" aria-labelledby="registerSuccess" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <?= session()->getFlashdata('msg') ?>
                        <?php endif; ?>
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Alert -->

    <!-- Modal Alert Login -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('AlertLogin')) : ?>
                var modal = new bootstrap.Modal(document.getElementById('alertLogin'));
                modal.show();
            <?php endif; ?>
        });
    </script>
    <div class="modal fade" id="alertLogin" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="alertLogin" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>
                        <div class="alert alert-info" role="alert">
                            Segera login untuk melanjutkan !
                        </div>
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-target="#loginModal" data-bs-toggle="modal" data-bs-dismiss="modal"><b>Login</b></button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Alert Login -->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apa anda yakin ingin Logout?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/auth/logout'); ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Logout -->

    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer class="footer" role="contentinfo" style="background-color:rgb(65 9 9 / 80%);">
        <div class="container">
            <div class="row">
                <div class="col-md-2 mb-2 mb-md-0">
                    <p align="center"><img src="<?php echo base_url('image/img/wulan_logo.png'); ?>" alt="gambar" width="150px"></p>
                    <p align="center" class="social">
                        <a href="https://wa.me/6285708958629" target="_blank"><span class="bi bi-whatsapp"></span></a>
                    </p>
                </div>
                <div class="col-md-9 ms-auto">
                    <div class="row site-section pt-0">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h3 style="color: gold;">Informasi</h3>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('/about'); ?>" style="color: whitesmoke;">Tentang Kami</a></li>
                                <li><a href="<?= base_url('/syarat'); ?>" style="color: whitesmoke;">Syarat & Ketentuan</a></li>
                                <li><a href="<?= base_url('/kontak'); ?>" style="color: whitesmoke;">Kontak Kami</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h3 style="color: gold;">Bantuan</h3>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('/carabelanja'); ?>" style="color: whitesmoke;">Cara Belanja</a></li>
                                <li><a href="<?= base_url('/pembayaran'); ?>" style="color: whitesmoke;">Konfirmasi Pembayaran</a></li>
                                <li><a href="<?= base_url('/infopengiriman'); ?>" style="color: whitesmoke;">Informasi Pengiriman</a></li>
                                <li><a href="<?= base_url('/policy'); ?>" style="color: whitesmoke;">Refund & Return Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h3 style="color:gold;">Komunitas</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="https://www.instagram.com/naturalcookingclub/?hl=en" target="_blank" style="color: whitesmoke;">Cake Indonesia</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-md-7">
                    <p class="copyright" style="color: gold;">WULAN COOKIES & CAKE - &copy; 2024 - All Rights Reserved</p>
                </div>
            </div>

        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets_home/vendor/aos/aos.js'); ?>"></script>
    <script src="<?php echo base_url('assets_home/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_home/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_home/vendor/php-email-form/validate.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets_home/js/main.js'); ?>"></script>

    <!-- Carousel -->
    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/script.js'); ?>"></script>

    <!-- External JS -->
    <script src="<?php echo base_url('js/cart.js'); ?>"></script>

    <!-- Maps -->
    <!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="<?= base_url('js/calculate_distance_leaflet.js') ?>"></script> -->
</body>

</html>