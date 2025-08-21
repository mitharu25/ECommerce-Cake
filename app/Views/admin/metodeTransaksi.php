<?= $this->extend('admin/template/sidebar'); ?>

<?= $this->section('contentAdmin'); ?>

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
                            <a href="#">Manage Component</a>
                        </li>
                        <li class="separator">
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/MTransaksi'); ?>">Metode Transaksi</a>
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
                                <h4 class="card-title">Metode Transaksi</h4>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary mb-4" style="width: 250px; margin-left:10px;" data-bs-toggle="modal" data-bs-target="#modaltambah">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                    Tambah Metode Transaksi
                                </button>
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Metode</th>
                                                <th>Kode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Metode</th>
                                                <th>Kode</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($MTransaksi as $MTrans) : ?>
                                                <tr>
                                                    <td><?= $MTrans['metode']; ?></td>
                                                    <td><?= $MTrans['kode']; ?></td>
                                                    <td align="center">
                                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $MTrans['id_transaksi']; ?>">
                                                            <span class="btn-label">
                                                                <i class="fa-solid fa-pencil"></i>
                                                            </span>
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#alertHapus<?= $MTrans['id_transaksi']; ?>">
                                                            <span class="btn-label">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </span>
                                                            Delete
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambah"><b>Tambah Metode Transaksi</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/MTrans/insert'); ?>" method="post">
                    <div class="container">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="metode" name="metode" placeholder="metode" required>
                            <label for="metode">Metode Transaksi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="kode" name="kode" placeholder="kode" required>
                            <label for="kode">Kode Transaksi</label>
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
<!-- End Modal Tambah -->

<!-- Modal Edit -->
<?php foreach ($MTransaksi as $MTrans) : ?>
    <div class=" modal fade" id="modalEdit<?= $MTrans['id_transaksi']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdit<?= $MTrans['id_transaksi']; ?>"><b>Edit Metode Transaksi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/admin/MTrans/update/' . $MTrans['id_transaksi']); ?>" method="post">
                        <div class="container">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="metode" name="metode" value="<?= $MTrans['metode']; ?>" placeholder="metode" required>
                                <label for="metode">Metode Transaksi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $MTrans['kode']; ?>" placeholder="kode" required>
                                <label for="kode">Kode Transaksi</label>
                            </div>
                            <p></p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit">Update</button>
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
<?php endforeach; ?>
<!-- End Modal Edit -->

<!-- Modal Delete -->
<?php foreach ($MTransaksi as $MTrans) : ?>
    <div class="modal fade" id="alertHapus<?= $MTrans['id_transaksi']; ?>" tabindex="-1" aria-labelledby="alertHapus<?= $MTrans['id_transaksi']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apakah Anda yakin ingin menghapus Metode Transaksi ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/MTrans/delete/' . $MTrans['id_transaksi']) ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Delete -->

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