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
                    <h1 class="fw-bold" style="margin-left: 400px;"><b>WULAN Cookies & Cake</b></h1>
                </div>
                <!-- First Dash -->
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Konsumen Akun</p>
                                            <h4 class="card-title"><?= $totalKonsumen; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="fa-solid fa-jar"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total Produk Terjual</p>
                                            <h4 class="card-title"><?= $totalProduk; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="fa-solid fa-cash-register"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total Penghasilan</p>
                                            <h4 class="card-title">Rp <?= number_format($totalHarga, 0, ',', '.'); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total Pemesanan</p>
                                            <h4 class="card-title"><?= $totalPesan; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End First Dash -->
                <div class="row">
                    <!-- Transaction History -->
                    <div class="col-md-8">
                        <div class="card card-round">
                            <div class="card-header">
                                <div class="card-head-row card-tools-still-right">
                                    <div class="card-title">Transaction History Latest</div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Pemesan</th>
                                                <th scope="col" class="text-end">Tanggal</th>
                                                <th scope="col" class="text-end">Harga</th>
                                                <th scope="col" class="text-end">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 0; ?>
                                            <?php foreach ($Transaction as $data1) : ?>
                                                <?php if ($count < 4) : ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                                                <i class="fa-solid fa-person"></i>
                                                            </button>
                                                            <?= $data1['nama'] ?>
                                                        </th>
                                                        <td class="text-end"><?= formatTanggal($data1['tanggal']) ?></td>
                                                        <td class="text-end">Rp <?= number_format($data1['total_harga'], 0, ',', '.'); ?></td>
                                                        <td class="text-end">
                                                            <?php if ($data1['status'] == "Menunggu Transaksi") : ?>
                                                                <span class="badge badge-warning"> <?= $data1['status'] ?></span>
                                                            <?php elseif ($data1['status'] == "Menunggu Konfirmasi") : ?>
                                                                <span class="badge badge-secondary"> <?= $data1['status'] ?></span>
                                                            <?php elseif ($data1['status'] == "Dikonfirmasi & Dikirim" || $data1['status'] == "Arrived") : ?>
                                                                <span class="badge badge-success"> <?= $data1['status'] ?></span>
                                                            <?php else : ?>
                                                                <span class="badge badge-danger"> <?= $data1['status'] ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php $count++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Transaction History -->
                    <!-- Download Report -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Download Report</div>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('admin/exportToExcel') ?>">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary">
                                            <span class="btn-label">
                                                <i class="fa-solid fa-file-excel"></i>
                                            </span>
                                            Export Data Penjualan
                                        </button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Download Report -->
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Jumlah Produk Terjual Dalam Perbulan</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Jumlah Penghasilan Dalam Perbulan</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="lineChartHarga"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var barChart = document.getElementById("barChart").getContext("2d");
        var lineChartHarga = document.getElementById("lineChartHarga").getContext("2d");

        var myBarChart = new Chart(barChart, {
            type: "bar",
            data: {
                labels: <?= json_encode($barChartData['labels']); ?>,
                datasets: [{
                    label: "Produk Terjual",
                    backgroundColor: "rgb(23, 125, 255)",
                    borderColor: "rgb(23, 125, 255)",
                    data: <?= json_encode($barChartData['data']); ?>,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                    }],
                },
            },
        });

        var myLineChartHarga = new Chart(lineChartHarga, {
            type: "line",
            data: {
                labels: <?= json_encode($lineChartDataHarga['labels']) ?>,
                datasets: [{
                    label: "Total Harga",
                    backgroundColor: "rgb(23, 125, 255)",
                    borderColor: "rgb(23, 125, 255)",
                    data: <?= json_encode($lineChartDataHarga['data']) ?>,
                    fill: false,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            }
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        }
                    }
                }
            },
        });
    });
</script>

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