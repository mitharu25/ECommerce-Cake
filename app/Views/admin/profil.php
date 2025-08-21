<?= $this->extend('admin/template/sidebar'); ?>

<?= $this->section('contentAdmin'); ?>

<?php
function formatTanggal($tanggal)
{
    if (empty($tanggal) || strtotime($tanggal) === false) {
        return '-';
    }
    $bulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    $date = new DateTime($tanggal);
    $formattedDate = $date->format('d') . ' ' . $bulan[(int)$date->format('m') - 1] . ' ' . $date->format('Y');
    return $formattedDate;
}
?>

<div class="wrapper">
    <div class="main-panel">
        <div class="container mt-3">
            <div class="page-inner">
                <div class="page-header">
                    <h3 class="fw-bold mb-3">WLN Cookies & Cake</h3>
                    <ul class="breadcrumbs mb-3">
                        <li class="nav-home">
                            <a href="<?= base_url('/admin/dashboard'); ?>">
                                <i class="fa-solid fa-house"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/Profil'); ?>">My Profile</a>
                        </li>
                    </ul>
                </div>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">My Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <h5><b>Nama Lengkap</b></h5>
                                            <h5><?= session('nama') ?></h5>
                                            <br>
                                            <h5><b>NIK</b></h5>
                                            <h5><?= session('nik') ?></h5>
                                            <br>
                                            <h5><b>Tanggal Lahir</b></h5>
                                            <h5><?= formatTanggal(session('tgl_lahir')) ?></h5>
                                            <br>
                                        </div>
                                        <div class="col">
                                            <h5><b>Jenis Kelamin</b></h5>
                                            <h5><?= session('jenkel') ?></h5>
                                            <br>
                                            <h5><b>Nomor Telephone</b></h5>
                                            <h5><?= session('phone') ?></h5>
                                            <br>
                                            <h5><b>Email</b></h5>
                                            <h5><?= session('email') ?></h5>
                                            <br>
                                        </div>
                                        <div class="col">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#modaledit">
                                                    <span class="btn-label">
                                                        <i class="fa-solid fa-address-card"></i>
                                                    </span>
                                                    Edit Profile
                                                </button>
                                                <button class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#modaledit2">
                                                    <span class="btn-label">
                                                        <i class="fa-solid fa-unlock-keyhole"></i>
                                                    </span>
                                                    Change Username & Password
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5><b>Alamat</b></h5>
                                            <h5><?= session('alamat') ?></h5>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Profil -->
<div class=" modal fade" id="modaledit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambah"> <i class="fa-solid fa-address-card"></i><b> Edit Profil</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/Profil/update/' . session('id_admin')); ?>" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= session('nama') ?>" required>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="nik" value="<?= session('nik') ?>" required>
                                    <label for="nik">NIK</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <?php
                                    $session = session();
                                    $selectedJenkel = $session->get('jenkel');
                                    ?>
                                    <select class="form-select" id="jenkel" name="jenkel" required>
                                        <option value="Laki - Laki" <?= ($selectedJenkel == 'Laki - Laki') ? 'selected' : ''; ?>>Laki - Laki</option>
                                        <option value="Perempuan" <?= ($selectedJenkel == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                    <label for="jenkel">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="tgl_lahir" value="<?= session('tgl_lahir') ?>" required>
                                    <label for="tgl_lahir">Tanggal lahir</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="<?= session('phone') ?>" required>
                                    <label for="phone">Nomor Telephone</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= session('email') ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 200px" required><?= session('alamat') ?></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                        <p></p>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-warning" type="submit">Update</button>
                        </div>
                        <p></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Profil -->

<!-- Modal Edit User Pass -->
<div class=" modal fade" id="modaledit2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambah"><i class="fa-solid fa-unlock-keyhole"></i><b> Edit Username & Password</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/Profil/updateUsername'); ?>" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="oldusername" name="oldusername" placeholder="oldusername" required>
                        <label for="oldusername">Masukkan Username Lama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="newusername" name="newusername" placeholder="newusername" required>
                        <label for="newusername">Masukkan Username Baru</label>
                    </div>
                    <p></p>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-warning" type="submit">Update Username</button>
                    </div>
                    <p></p>
                </form>
                <hr>
                <form action="<?= base_url('/admin/Profil/updatePassword'); ?>" method="post">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="oldpassword" required>
                        <label for="oldpassword">Masukkan Password Lama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="newpassword" required>
                        <label for="newpassword">Masukkan Password Baru</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="Cpassword" name="Cpassword" placeholder="Cpassword" required>
                        <label for="Cpassword">Konfirmasi Password Baru</label>
                    </div>
                    <p></p>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-warning" type="submit">Update Password</button>
                    </div>
                    <p></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit User Pass -->

<!-- jQuery -->
<script src="<?php echo base_url('assets_admin/external/Table/jquery-3.6.0.min.js'); ?>"></script>
<!-- DataTables JS -->
<script src="<?php echo base_url('assets_admin/external/Table/jquery.dataTables.min.js'); ?>"></script>
<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $("#multi-filter-select").DataTable({
            pageLength: 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select class="form-select"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + "</option>");
                    });
                });
            },
        });
    });
</script>

<?= $this->endSection(); ?>