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
                            <a href="#">Report</a>
                        </li>
                        <li class="separator">
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/Chart'); ?>">Report Penjualan</a>
                        </li>
                    </ul>
                </div>
                <!-- Chart Penjualan -->
                <div class="col-md-4">
                    <div class="card card-primary card-round">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Daily Sales</div>
                                <div class="card-tools">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-label-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Export
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-category">March 25 - April 02</div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="mb-4 mt-2">
                                <h1>$4,578.58</h1>
                            </div>
                            <div class="pull-in">
                                <canvas id="dailySalesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Chart Penjualan -->
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('dailySalesChart').getContext('2d');
        var dailySalesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Daily Sales',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(255, 255, 255, 0.2)',
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
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