<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Wulan Cookies & Cake - Admin</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?php echo base_url('/image/img/wulan_logo.png'); ?>" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?php echo base_url('assets_admin/js/plugin/webfont/webfont.min.js'); ?>"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                // urls: ["assets/css/fonts.min.css"],
                urls: <?php echo base_url('assets_admin/css/fonts.min.css'); ?>
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets_admin/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets_admin/css/plugins.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets_admin/css/kaiadmin.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets_admin/external/fontAwesome/css/all.min.css'); ?>" />


</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="<?= base_url('/admin/dashboard'); ?>" class="logo" style="margin-left: 75px; margin-top:10px;">
                    <img src="<?php echo base_url('/image/img/wulan_logo.png'); ?>" alt="navbar brand" class="navbar-brand" height="65" />
                </a>
            </div>
            <h5 align="center" style="color: gold; margin-top:5px;"><b>Wulan Cookies & Cake</b></h5>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>">
                            <i class="fa-solid fa-arrow-left" style="color:orange;"></i>
                            <p style="color: orange;">Dashboard Utama</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/dashboard'); ?>">
                            <i class="fa-solid fa-house" style="color: #4d7cfe;"></i>
                            <p style="color: white;">Home & Report</p>
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Manage Component</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/ProdukKue'); ?>">
                            <i class="fa-solid fa-cookie-bite" style="color: #4d7cfe;"></i>
                            <p style="color: white;">Produk Kue</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/MTransaksi'); ?>">
                            <i class="fa-solid fa-credit-card" style="color: #4d7cfe;"></i>
                            <p style="color: white;">Metode Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Manage Order</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/orders'); ?>">
                            <i class="fa-solid fa-envelope-open-text" style="color: #4d7cfe;"></i>
                            <p style="color: white;">Semua Pesanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#dropdown1">
                            <i class="fa-solid fa-list-check" style="color: #4d7cfe;"></i>
                            <p style="color: white;">Status</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="dropdown1">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?= base_url('/admin/MT'); ?>">
                                        <span class="sub-item" style="color: white;">Menunggu Transaksi</span>
                                        <span class="badge badge-success"><?= $menungguTransaksi; ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/admin/MK'); ?>">
                                        <span class="sub-item" style="color: white;">Menunggu Konfirmasi</span>
                                        <span class="badge badge-success"><?= $menungguKonfirmasi; ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/admin/DD'); ?>">
                                        <span class="sub-item" style="color: white;">Dikonfirmasi & Dikirim</span>
                                        <span class="badge badge-success"><?= $dikonfirmasiDikirim; ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/admin/Arrived'); ?>">
                                        <span class="sub-item" style="color: white;">Arrived</span>
                                        <span class="badge badge-success"><?= $arrived; ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/admin/Dibatalkan'); ?>">
                                        <span class="sub-item" style="color: white;">Dibatalkan</span>
                                        <span class="badge badge-success"><?= $cancelled; ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Manage Users</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/UKonsumen'); ?>">
                            <i class="fa-solid fa-user" style="color: #4d7cfe;"></i>
                            <p style="color: white;">User Konsumen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/UAdmin'); ?>">
                            <i class="fa-solid fa-user-shield" style="color: #4d7cfe;"></i>
                            <p style="color: white;">User Admin</p>
                        </a>
                    </li>
                    <!-- <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Report</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/Chart'); ?>">
                            <i class="fa-solid fa-chart-simple" style="color:#f0ad4e;"></i>
                            <p style="color: white;">Penjualan</p>
                        </a>
                    </li> -->
                    <hr>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/Profil'); ?>">
                            <i class="fa-solid fa-id-badge" style="color:lightgreen;"></i>
                            <p style="color:lightgreen;">Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal2">
                            <i class="fa-solid fa-right-from-bracket" style="color: red;"></i>
                            <p style="color: red;">Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal2" tabindex="-1" aria-labelledby="logoutModal2" aria-hidden="true">
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

    <?= $this->renderSection('contentAdmin'); ?>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets_admin/js/core/jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_admin/js/core/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_admin/js/core/bootstrap.min.js'); ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url('assets_admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js'); ?>"></script>

    <!-- Chart JS -->
    <script src="<?php echo base_url('assets_admin/js/plugin/chart.js/chart.min.js'); ?>"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo base_url('assets_admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js'); ?>"></script>

    <!-- Chart Circle -->
    <script src="<?php echo base_url('assets_admin/js/plugin/chart-circle/circles.min.js'); ?>"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url('assets_admin/js/plugin/datatables/datatables.min.js'); ?>"></script>

    <!-- Bootstrap Notify -->
    <script src="<?php echo base_url('assets_admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js'); ?>"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?php echo base_url('assets_admin/js/plugin/jsvectormap/jsvectormap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_admin/js/plugin/jsvectormap/world.js'); ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo base_url('assets_admin/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>

    <!-- Kaiadmin JS -->
    <script src="<?php echo base_url('assets_admin/js/kaiadmin.min.js'); ?>"></script>
</body>

</html>