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
                            <a href="<?= base_url('/admin/DD'); ?>">Pesanan Dikonfirmasi & Dikirim</a>
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
                                <h4 class="card-title">Pesanan Dikonfirmasi & Dikirim</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pemesan</th>
                                                <th>Produk</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pemesan</th>
                                                <th>Produk</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($order as $data) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= formatTanggal($data['tanggal']) ?></td>
                                                    <td><?= $data['nama']; ?></td>
                                                    <td>
                                                        <?php
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
                                                    </td>
                                                    <td><?= $data['alamat']; ?></td>
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
                                                        <button class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#modal1<?= $data['id_order']; ?>">
                                                            <span class="btn-label">
                                                                <i class="fa-solid fa-check"></i>
                                                            </span>
                                                            Arrived
                                                        </button>
                                                        <a href="<?= site_url('/admin/downloadStrukPDF/' . $data['id_order']) ?>">
                                                            <button class="btn btn-primary mb-3">
                                                                <span class="btn-label">
                                                                    <i class="fa-solid fa-file-pdf"></i>
                                                                </span>
                                                                Download Struk
                                                            </button>
                                                        </a>
                                                        <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#modal2<?= $data['id_order']; ?>">
                                                            <span class="btn-label">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </span>
                                                            Batalkan Pesanan
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

<!-- Modal Berhasil -->
<?php foreach ($order as $data) : ?>
    <div class="modal fade" id="modal1<?= $data['id_order']; ?>" tabindex="-1" aria-labelledby="modal1<?= $data['id_order']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apakah anda yakin pesanan sudah sampai ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/status/Arrived/' . $data['id_order']); ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Batal -->
<?php foreach ($order as $data) : ?>
    <div class="modal fade" id="modal2<?= $data['id_order']; ?>" tabindex="-1" aria-labelledby="modal2<?= $data['id_order']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apa anda yakin ingin membatalkan pesanan ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
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