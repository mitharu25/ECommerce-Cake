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
                            <a href="<?= base_url('/admin/UKonsumen'); ?>">User Konsumen</a>
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
                                <h4 class="card-title">User Konsumen</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>No.Telephone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>No.Telephone</th>
                                                <th>Email</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($konsumen as $data) : ?>
                                                <tr>
                                                    <td><?= $data['fullname']; ?></td>
                                                    <td><?= $data['phone']; ?></td>
                                                    <td><?= $data['email']; ?></td>
                                                    <td align="center">
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1<?= $data['id_konsumen']; ?>">
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

<!-- Modal Detail -->
<?php foreach ($konsumen as $data) : ?>
    <div class="modal fade" id="modal1<?= $data['id_konsumen']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal1<?= $data['id_konsumen']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1<?= $data['id_konsumen']; ?>"><b>Detail User Konsumen</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3 mt-3">
                            <div class="col">
                                <h5><b>Nama Lengkap </b></h5>
                                <h6><?= $data['fullname']; ?></h6>
                                <p></p>
                                <h5><b>No.Telephone </b></h5>
                                <h6><?= $data['phone']; ?></h6>
                                <p></p>
                                <h5><b>Email </b></h5>
                                <h6><?= $data['email']; ?></h6>
                                <p></p>
                                <h5><b>Alamat </b></h5>
                                <h6><?= $data['alamat']; ?></h6>
                                <p></p>
                                <h5><b>Username </b></h5>
                                <h6><?= $data['username']; ?></h6>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#modal2<?= $data['id_konsumen']; ?>">
                                        <span class="btn-label">
                                            <i class="fa-solid fa-key"></i>
                                        </span>
                                        Reset Password
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal3<?= $data['id_konsumen']; ?>">
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

<!-- Modal Hapus -->
<?php foreach ($konsumen as $data) : ?>
    <div class="modal fade" id="modal3<?= $data['id_konsumen']; ?>" tabindex="-1" aria-labelledby="modal3<?= $data['id_konsumen']; ?>" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal1<?= $data['id_konsumen']; ?>" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/UKonsumen/hapus/' . $data['id_konsumen']) ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Reset Password -->
<?php foreach ($konsumen as $data) : ?>
    <div class="modal fade" id="modal2<?= $data['id_konsumen']; ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modal2<?= $data['id_konsumen']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Reset Password Akun <?= $data['fullname']; ?></b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="<?= base_url('/admin/UKonsumen/resetPassword/' . $data['id_konsumen']); ?>" method="post">
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal1<?= $data['id_konsumen']; ?>" data-bs-dismiss="modal">Batal</button>
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