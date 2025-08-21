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
                            <a href="#">Manage Order</a>
                        </li>
                        <li class="separator">
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/orders'); ?>">Semua Pesanan</a>
                        </li>
                    </ul>
                </div>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                                <h4 class="card-title">Semua Pesanan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Total Harga (Rp)</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Total Harga (Rp)</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($orders as $data) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= formatTanggal($data['tanggal']) ?></td>
                                                    <td><?= number_format($data['total_harga'], 0, ',', '.'); ?></td>
                                                    <td><?= $data['metode_pembayaran']; ?></td>
                                                    <td><?= formatTanggal($data['tanggal_bayar']) ?></td>
                                                    <?php if ($data['status'] == "Menunggu Transaksi") : ?>
                                                        <td style="vertical-align: middle; text-shadow: 0px 0px 5px yellow;"><?= $data['status'] ?></td>
                                                    <?php elseif ($data['status'] == "Menunggu Konfirmasi") : ?>
                                                        <td style="vertical-align: middle; text-shadow: 0px 0px 5px blue;"><?= $data['status'] ?></td>
                                                    <?php elseif ($data['status'] == "Dikonfirmasi & Dikirim" || $data['status'] == "Arrived") : ?>
                                                        <td style="vertical-align: middle; text-shadow: 0px 0px 5px green;"><?= $data['status'] ?></td>
                                                    <?php else : ?>
                                                        <td style="vertical-align: middle; text-shadow: 0px 0px 5px red;"><?= $data['status'] ?></td>
                                                    <?php endif; ?>
                                                    <td align="center">
                                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#detail<?= $data['id_order']; ?>">
                                                            <span class="btn-label">
                                                                <i class="fa-solid fa-circle-info"></i>
                                                            </span>
                                                            Detail
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
<?php foreach ($orders as $data) : ?>
    <div class=" modal fade" id="detail<?= $data['id_order']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail<?= $data['id_order']; ?>"><b>Detail Pesanan</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: blue;"><b>Tanggal : <?= formatTanggal($data['tanggal']) ?></b></h6>
                    <p></p>
                    <div class="row">
                        <div class="col">
                            <h6>Nama Pemesan : <b><?= $data['nama']; ?></b></h6>
                        </div>
                        <div class="col">
                            <h6>No.Telephone : <b><?= $data['phone']; ?></b></h6>
                        </div>
                    </div>
                    <p></p>
                    <h6>Alamat : <b><?= $data['alamat']; ?></b></h6>
                    <hr>
                    <h6 style="color: blue;"><b>Produk</b></h6>
                    <h6>
                        <ul>
                            <?php
                            $i = 1;
                            $produkArray = explode("\n", $data['produk']);
                            foreach ($produkArray as $produk) {
                                $produkDetail = explode(' - ', $produk);
                                if (count($produkDetail) == 3) {
                                    echo "{$produkDetail[0]} ({$produkDetail[1]}) {$produkDetail[2]}<br>";
                                } else {
                                    echo "Format data produk tidak sesuai: {$produk}<br>";
                                }
                            }
                            ?>
                        </ul>
                    </h6>
                    <p></p>
                    <div class="row">
                        <div class="col">
                            <h6>Total Harga : <b>Rp <?= number_format($data['total_harga'], 0, ',', '.'); ?></b></h6>
                        </div>
                        <div class="col">
                            <h6>Jumlah Produk : <b><?= $data['total_produk']; ?></b></h6>
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col">
                            <h6>Metode Pembayaran : <b><?= $data['metode_pembayaran']; ?></b></h6>
                        </div>
                        <div class="col">
                            <h6>Tanggal Bayar : <b><?= formatTanggal($data['tanggal_bayar']) ?></b></h6>
                        </div>
                    </div>
                    <p></p>
                    <h6>Status : <b><?= $data['status']; ?></b></h6>
                    <p></p>
                    <h6 style="margin-left: 50px;">
                        <div>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_order']; ?>" data-bs-dismiss="modal">
                                <span class="btn-label">
                                    <i class="fa-solid fa-pencil"></i>
                                </span>
                                Edit Status
                            </button>
                        </div>
                    </h6>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Detail -->

<!-- Modal Edit Status -->
<?php foreach ($orders as $data) : ?>
    <div class=" modal fade" id="edit<?= $data['id_order']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit<?= $data['id_order']; ?>"><b>Edit Status Pesanan</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#MT<?= $data['id_order']; ?>">Menunggu Transaksi</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#MK<?= $data['id_order']; ?>">Menunggu Konfirmasi</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#DD<?= $data['id_order']; ?>">Dikonfirmasi & Dikirim</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#Arrived<?= $data['id_order']; ?>">Arrived</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#cancel<?= $data['id_order']; ?>">Dibatalkan</button>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#detail<?= $data['id_order']; ?>" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Edit Status -->

<!-- Edit MT -->
<?php foreach ($orders as $data) : ?>
    <div class="modal fade" id="MT<?= $data['id_order']; ?>" tabindex="-1" aria-labelledby="MT<?= $data['id_order']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apa anda yakin ingin menggantikan status menjadi Menunggu Transaksi ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_order']; ?>" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/status/MT/' . $data['id_order']); ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Edit MK -->
<?php foreach ($orders as $data) : ?>
    <div class="modal fade" id="MK<?= $data['id_order']; ?>" tabindex="-1" aria-labelledby="MK<?= $data['id_order']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apa anda yakin ingin menggantikan status menjadi Menunggu Konfirmasi ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_order']; ?>" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/status/MK/' . $data['id_order']); ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Edit DD -->
<?php foreach ($orders as $data) : ?>
    <div class="modal fade" id="DD<?= $data['id_order']; ?>" tabindex="-1" aria-labelledby="DD<?= $data['id_order']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apa anda yakin ingin menggantikan status menjadi Dikonfirmasi & Dikirim ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_order']; ?>" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/status/DD/' . $data['id_order']); ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Edit Arrived -->
<?php foreach ($orders as $data) : ?>
    <div class="modal fade" id="Arrived<?= $data['id_order']; ?>" tabindex="-1" aria-labelledby="Arrived<?= $data['id_order']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apa anda yakin ingin menggantikan status menjadi Arrived ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_order']; ?>" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/status/Arrived/' . $data['id_order']); ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Edit Cancelled -->
<?php foreach ($orders as $data) : ?>
    <div class="modal fade" id="cancel<?= $data['id_order']; ?>" tabindex="-1" aria-labelledby="cancel<?= $data['id_order']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apa anda yakin ingin menggantikan status menjadi Dibatalkan ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_order']; ?>" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/status/cancel/' . $data['id_order']); ?>" style="text-decoration: none;">
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