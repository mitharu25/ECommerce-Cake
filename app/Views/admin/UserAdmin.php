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
                            <a href="#">Manage Users</a>
                        </li>
                        <li class="separator">
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/UAdmin'); ?>">User Admin</a>
                        </li>
                    </ul>
                </div>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                <h4 class="card-title">User Admin</h4>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary mb-4" style="width: 250px; margin-left:10px;" data-bs-toggle="modal" data-bs-target="#modaltambah">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                    Tambah Akun Admin
                                </button>
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>NIK</th>
                                                <th>No.Telephone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>NIK</th>
                                                <th>No.Telephone</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($admin as $data) : ?>
                                                <tr>
                                                    <td><?= $data['nama']; ?></td>
                                                    <td><?= $data['nik']; ?></td>
                                                    <td><?= $data['jenkel']; ?></td>
                                                    <td align="center">
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1<?= $data['id_admin']; ?>">
                                                            <span class="btn-label">
                                                                <i class="fa-solid fa-circle-info"></i>
                                                            </span>
                                                            Detail Akun
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class=" modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambah"><b>Tambah Akun Admin</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/UAdmin/insert'); ?>" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="nik" required>
                                    <label for="nik">NIK</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="jenkel" name="jenkel" required>
                                        <option value="Laki - Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="jenkel">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="tgl_lahir" required>
                                    <label for="tgl_lahir">Tanggal lahir</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" required>
                                    <label for="phone">Nomor Telephone</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 200px" required></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                        <p></p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm_password" required>
                            <label for="confirm_password">Confirm Password</label>
                        </div>
                        <p></p>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit">Simpan</button>
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
<!-- end Modal Tambah -->

<!-- Modal Detail -->
<?php
$totalData = count($admin);
?>
<?php foreach ($admin as $data) : ?>
    <div class="modal fade" id="modal1<?= $data['id_admin']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal1<?= $data['id_admin']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1<?= $data['id_admin']; ?>"><b>Detail User Admin</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3 mt-3">
                            <div class="col">
                                <h5><b>Nama Lengkap </b></h5>
                                <h6><?= $data['nama']; ?></h6>
                                <p></p>
                                <h5><b>NIK </b></h5>
                                <h6><?= $data['nik']; ?></h6>
                                <p></p>
                                <h5><b>Jenis Kelamin </b></h5>
                                <h6><?= $data['jenkel']; ?></h6>
                                <p></p>
                                <h5><b>Tanggal Lahir </b></h5>
                                <h6><?= formatTanggal($data['tgl_lahir']); ?></h6>
                                <p></p>
                                <h5><b>Alamat </b></h5>
                                <h6><?= $data['alamat']; ?></h6>
                                <p></p>
                                <h5><b>No.Telephone </b></h5>
                                <h6><?= $data['phone']; ?></h6>
                                <p></p>
                                <h5><b>Email </b></h5>
                                <h6><?= $data['email']; ?></h6>
                                <p></p>
                                <h5><b>Username </b></h5>
                                <h6><?= $data['username']; ?></h6>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#modal2<?= $data['id_admin']; ?>">
                                        <span class="btn-label">
                                            <i class="fa-solid fa-key"></i>
                                        </span>
                                        Reset Password
                                    </button>
                                    <button class="btn btn-danger mb-3 <?= $totalData < 2 ? 'disabled' : ''; ?>" data-bs-toggle="modal" data-bs-target="#modal3<?= $data['id_admin']; ?>">
                                        <span class="btn-label">
                                            <i class="fa-solid fa-trash"></i>
                                        </span>
                                        Hapus Akun
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Detail -->

<!-- Modal Reset -->
<?php foreach ($admin as $data) : ?>
    <div class="modal fade" id="modal2<?= $data['id_admin']; ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modal2<?= $data['id_admin']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Reset Password Akun <?= $data['nama']; ?></b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="<?= base_url('/admin/UAdmin/resetPassword/' . $data['id_admin']); ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Masukkan Username Akun</label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="username" required>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-warning">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal1<?= $data['id_admin']; ?>" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($admin as $data) : ?>
    <div class="modal fade" id="modal3<?= $data['id_admin']; ?>" tabindex="-1" aria-labelledby="modal3<?= $data['id_admin']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: red;"><b>Apakah Anda yakin ingin menghapus Akun ini ? </b></h6>
                    <p>Note : Jika terhapus maka akun tidak dapat dikembalikan</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal1<?= $data['id_admin']; ?>" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/UAdmin/hapus/' . $data['id_admin']) ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

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