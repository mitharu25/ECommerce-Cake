<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;"><a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a> <span style="color:lime;">/ Pesanan Saya</span></h5>
</section>

<main id="main">
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
    <section class="section cta-section" style="padding: 0rem 0; background-color:snow;">
        <div class="container mx-auto mt-4 mb-3">
            <h3><b>History Pesanan Saya</b></h3>
            <hr style="border: 0;height: 3px;background-color: blue;">
            <?php if (!empty($order)) : ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($order as $item) : ?>
                            <tr>
                                <td style="vertical-align: middle;"><?= $i++; ?></td>
                                <?php
                                // Pisahkan teks produk menjadi array berdasarkan baris
                                $products = explode("\n", $item->produk);
                                ?>
                                <td style="vertical-align: middle;">
                                    <ul>
                                        <?php foreach ($products as $product) : ?>
                                            <?php
                                            // Pisahkan setiap produk menjadi potongan-potongan
                                            $parts = explode(" - ", $product);
                                            ?>
                                            <li><?= $parts[0] ?> - <?= $parts[1] ?> - <?= $parts[2] ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td style="vertical-align: middle;">Rp <?= number_format($item->total_harga, 0, ',', '.'); ?></td>
                                <td style="vertical-align: middle;"><?= formatTanggal($item->tanggal) ?></td>
                                <?php if ($item->status == "Menunggu Transaksi") : ?>
                                    <td style="vertical-align: middle; text-shadow: 0px 0px 5px yellow;"><?= $item->status ?></td>
                                <?php elseif ($item->status == "Menunggu Konfirmasi") : ?>
                                    <td style="vertical-align: middle; text-shadow: 0px 0px 5px blue;"><?= $item->status ?></td>
                                <?php elseif ($item->status == "Dikonfirmasi & Dikirim" || $item->status == "Arrived") : ?>
                                    <td style="vertical-align: middle; text-shadow: 0px 0px 5px green;"><?= $item->status ?></td>
                                <?php else : ?>
                                    <td style="vertical-align: middle; text-shadow: 0px 0px 5px red;"><?= $item->status ?></td>
                                <?php endif; ?>
                                <td style="vertical-align: middle;">
                                    <?php if ($item->status == "Menunggu Transaksi") : ?>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#bayar<?= $item->id_order ?>" class="btn btn-warning btn-sm" style="background-color: #ffd700; border-color: #ffd700; color:black;"><b>Bayar Pesanan</b></button>
                                    <?php elseif ($item->status == "Dibatalkan") : ?>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#Lihatbayar<?= $item->id_order ?>" class="btn btn-warning btn-sm" style="background-color:grey; border-color: #00BFFF; color:black;" disabled><b>Lihat Bukti Pembayaran</b></button>
                                    <?php else : ?>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#Lihatbayar<?= $item->id_order ?>" class="btn btn-warning btn-sm" style="background-color:#00BFFF; border-color: #00BFFF; color:black;"><b>Lihat Bukti Pembayaran</b></button>
                                    <?php endif; ?>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#Detailbayar<?= $item->id_order ?>" class="btn btn-warning btn-sm" style="background-color: #87CEEB; border-color: #87CEEB; color:black;"><b>Detail</b></button>
                                </td>
                                <td style="vertical-align: middle;">
                                    <?php if ($item->status == "Menunggu Transaksi") : ?>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#alertCancel<?= $item->id_order ?>" style="background-color: red; display: flex; justify-content: center; align-items: center;">
                                            <i class="bi bi-x-circle" style="color:white; font-size: 20px;"></i>
                                        </button>
                                    <?php elseif ($item->status == "Dikonfirmasi & Dikirim"  || $item->status == "Menunggu Konfirmasi") : ?>
                                        <button type="button" style="background-color: grey; display: flex; justify-content: center; align-items: center;" disabled>
                                            <i class="bi bi-x-circle" style="color:whitesmoke; font-size: 20px;"></i>
                                        </button>
                                    <?php else : ?>
                                        <button role="button" data-bs-toggle="modal" data-bs-target="#alertHapus<?= $item->id_order ?>" style="background-color: red; display: flex; justify-content: center; align-items: center;">
                                            <i class="bi bi-trash-fill" style="color:white; font-size: 20px;"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr style="border: 0;height: 2px;background-color: black;">
                <br>
                <h6 style="color: black;">Note : Pemesanan tidak bisa dicancel atau dihapus ketika status masih "Menunggu Konfirmasi" dan "Dikonfirmasi & Dikirim". History pemesanan yang sudah dihapus tidak bisa dikembalikan kembali, jika terjadi masalah/kendala silahkan hubungi admin.</h6>
                <br>
            <?php else : ?>
                <br>
                <h5 style="color: green;" align="center"><b>Anda belum melakukan pemesanan</b></h5>
                <br>
            <?php endif; ?>
        </div>
    </section>

    <?php foreach ($order as $item) : ?>
        <!-- Modal Bayar -->
        <div class="modal fade" id="bayar<?= $item->id_order ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bayar<?= $item->id_order ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="bayar<?= $item->id_order ?>">Bayar Pesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('/uploadBukti') ?>" method="post" enctype="multipart/form-data">
                            <select class="form-select" aria-label="Default select example" name="metode_pembayaran" id="paymentSelect<?= $item->id_order ?>" required>
                                <option selected>Silahkan pilih metode pembayaran</option>
                                <?php foreach ($transaksi as $trans) : ?>
                                    <option value="<?= $trans['metode']; ?>"><?= $trans['metode']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-sm" style="background-color: whitesmoke; font-size:medium;" id="metode_pembayaran<?= $item->id_order ?>" value="" readonly required>
                            </div>
                            <p style="color: black;">Total Harga : <b>Rp <?= number_format($item->total_harga, 0, ',', '.'); ?></b></p>
                            <hr style="border: 3px solid green; height: 0;">
                            <p style="color: black;" align="center">Upload bukti pembayaran sesuai metode yang dipilih</p>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="file" required>
                            </div>
                            <?php if (!empty($file)) : ?>
                                <input type="hidden" name="file_id" value="<?= $file['id'] ?>" />
                            <?php endif; ?>
                            <input type="hidden" name="id_order" value="<?= $item->id_order ?>">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" align="center" class="btn btn-warning btn-sm" name="submit" value="Upload"><b>Upload</b></button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('paymentSelect<?= $item->id_order ?>').addEventListener('change', function() {
                var metodePembayaranInput = document.getElementById('metode_pembayaran<?= $item->id_order ?>');
                var selectedMethod = this.value;
                var transaksi = <?php echo json_encode($transaksi); ?>;
                metodePembayaranInput.value = '';

                transaksi.forEach(function(trans) {
                    if (trans['metode'] === selectedMethod) {
                        metodePembayaranInput.value = trans['kode'];
                    }
                });
            });
        </script>
        <!-- end Modal Bayar -->

        <!-- Modal Lihat Bukti Pembayaran -->
        <div class="modal fade" id="Lihatbayar<?= $item->id_order ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Lihatbayar<?= $item->id_order ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="Lihatbayar<?= $item->id_order ?>">Lihat Bukti Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="<?= base_url('image/upload/buktiPembayaran/' . $item->file_bukti); ?>" alt="Bukti Pembayaran" style="display: block; margin-left: auto; margin-right: auto; width: 310px; height: 410px;">
                        <hr style="border: 3px solid blue; height: 0;">
                        <div class="d-flex justify-content-center gap-2">
                            <?php if ($item->status == "Dikonfirmasi & Dikirim" || $item->status == "Arrived") : ?>
                            <?php else : ?>
                                <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#editbayar<?= $item->id_order ?>">
                                    <i class="bi bi-pencil"></i> <b>Edit</b>
                                </button>
                            <?php endif; ?>
                            <a class="btn btn-info btn-sm" role="button" href="<?= base_url('/uploadBukti/download/' . $item->id_order) ?>">
                                <i class="bi bi-box-arrow-down"></i> <b>Download</b>
                            </a>
                        </div>
                        <hr>
                        <p style="color: black;">Note : Jika bukti pembayaran sudah dikonfirmasi, maka tidak bisa di Edit</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal Lihat Bukti Pembayaran -->

        <!-- Modal Edit Bukti Pembayaran -->
        <div class="modal fade" id="editbayar<?= $item->id_order ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editbayar<?= $item->id_order ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editbayar<?= $item->id_order ?>">Edit Bayar Pesanan <i class="bi bi-pencil"></i></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('/uploadBukti/editBukti') ?>" method="post" enctype="multipart/form-data">
                            <select class="form-select" aria-label="Default select example" name="metode_pembayaran" id="paymentSelect2<?= $item->id_order ?>" required>
                                <option selected>Silahkan pilih metode pembayaran</option>
                                <option value="Rekening Mandiri">Rekening Mandiri</option>
                                <option value="GoPay">GoPay</option>
                            </select>
                            <br>
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-sm" style="background-color: whitesmoke; font-size:medium;" id="metode_pembayaran2<?= $item->id_order ?>" value="" readonly required>
                            </div>
                            <p style="color: black;">Total Harga : <b>Rp <?= number_format($item->total_harga, 0, ',', '.'); ?></b></p>
                            <hr style="border: 3px solid green; height: 0;">
                            <p style="color: black;" align="center">Upload bukti pembayaran sesuai metode yang dipilih</p>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="file" required>
                            </div>
                            <?php if (!empty($file)) : ?>
                                <input type="hidden" name="file_id" value="<?= $file['id'] ?>" />
                            <?php endif; ?>
                            <input type="hidden" name="id_order" value="<?= $item->id_order ?>">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" align="center" class="btn btn-warning btn-sm" name="submit" value="Upload"><b>Edit Upload</b></button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Lihatbayar<?= $item->id_order ?>">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('paymentSelect2<?= $item->id_order ?>').addEventListener('change', function() {
                var metodePembayaranInput = document.getElementById('metode_pembayaran2<?= $item->id_order ?>');
                if (this.value == 'Rekening Mandiri') {
                    metodePembayaranInput.value = '123';
                } else if (this.value == 'GoPay') {
                    metodePembayaranInput.value = '321';
                } else {
                    metodePembayaranInput.value = '';
                }
            });
        </script>
        <!-- end Modal Edit Bukti Pembayaran -->

        <!-- Modal Detail Bukti Pembayaran -->
        <div class="modal fade" id="Detailbayar<?= $item->id_order ?>" aria-labelledby="Detailbayar<?= $item->id_order ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="Detailbayar<?= $item->id_order ?>">Detail Bukti Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 style="color:green"><b>Tanggal Pemesanan : <?= formatTanggal($item->tanggal) ?></b></h6>
                        <p style="color: black;"><b>Nama lengkap : </b><?= $item->nama ?></p>
                        <p style="color: black;"><b>No.Telepone : </b><?= $item->phone ?></p>
                        <p style="color: black;"><b>Alamat dituju : </b><?= $item->alamat ?></p>
                        <hr style="border: 3px solid black; height: 0;">
                        <p style="color: black;"><b>Produk : </b>
                            <?php
                            // Pisahkan teks produk menjadi array berdasarkan baris
                            $products = explode("\n", $item->produk);
                            ?>
                            <td style="vertical-align: middle;">
                                <ul>
                                    <?php foreach ($products as $product) : ?>
                                        <?php
                                        // Pisahkan setiap produk menjadi potongan-potongan
                                        $parts = explode(" - ", $product);
                                        ?>
                                        <li style="color: black;"><?= $parts[0] ?> - <?= $parts[1] ?> - <?= $parts[2] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        </p>
                        <p style="color: black;"><b>Jumlah produk : </b><?= $item->total_produk ?></p>
                        <p style="color: black;"><b>Total harga : </b>Rp <?= number_format($item->total_harga, 0, ',', '.'); ?></p>
                        <hr style="border: 3px solid black; height: 0;">
                        <p style="color: black;"><b>Metode pembayaran : </b><?= $item->metode_pembayaran ?></p>
                        <p style="color: black;"><b>Tanggal pembayaran : </b><?= formatTanggal($item->tanggal_bayar) ?></p>
                        <p style="color: darkblue;"><b>Status : <?= $item->status ?> </b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal Detail Bukti Pembayaran -->

        <!-- Modal Cancel -->
        <div class="modal fade" id="alertCancel<?= $item->id_order ?>" tabindex="-1" aria-labelledby="alertCancel<?= $item->id_order ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 style="color: black;">Apa anda yakin ingin membatalkan pemesanan?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <a href="<?= base_url('/uploadBukti/cancel/' . $item->id_order) ?>" style="text-decoration: none;">
                            <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal Cancel -->

        <!-- Modal Hapus -->
        <div class="modal fade" id="alertHapus<?= $item->id_order ?>" tabindex="-1" aria-labelledby="alertHapus<?= $item->id_order ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 style="color: black;">Apa anda yakin ingin menghapus dari history pemesanan?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <a href="<?= base_url('/uploadBukti/delete/' . $item->id_order) ?>" style="text-decoration: none;">
                            <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal Hapus -->
    <?php endforeach; ?>

    <!-- Modal Alert -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('alertuploads')) : ?>
                var modal = new bootstrap.Modal(document.getElementById('alertupload'));
                modal.show();
            <?php endif; ?>
        });
    </script>
    <div class="modal fade" id="alertupload" tabindex="-1" aria-labelledby="alertupload" aria-hidden="true">
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
    <!-- end Modal Alert -->

    <!-- modal order success -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('successOrder')) : ?>
                var modal = new bootstrap.Modal(document.getElementById('successOrder'));
                modal.show();
            <?php endif; ?>
        });
    </script>
    <div class="modal fade" id="successOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successOrder" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"></button>
                    <br>
                    <img src="<?= base_url('image/img/shopping-bag.png') ?>" alt="Example Image" width="200" height="150" align="center" style="display: block; margin: 0 auto; margin-left:150px;">
                    <br>
                    <h3 align="center" style="color:green;"><b>SUCCESS</b></h3>
                    <br>
                    <h6 align="center">Selanjutnya silahkan transaksi & upload bukti pembayaran nya</h6>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal"><b>Buka Transaksi</b></button>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal order success -->

    <!-- Modal Alert Sukses -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('successTransfer')) : ?>
                var modal = new bootstrap.Modal(document.getElementById('successTransfer'));
                modal.show();
            <?php endif; ?>
        });
    </script>
    <div class="modal fade" id="successTransfer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successTransfer" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"></button>
                    <br>
                    <img src="<?= base_url('image/img/check.png') ?>" alt="Example Image" width="200" height="170" align="center" style="display: block; margin: 0 auto; margin-left:135px;">
                    <br>
                    <h3 align="center" style="color:green;"><b>TRANSACTION SUCCESS</b></h3>
                    <br>
                    <h6 align="center"><b>Selanjutnya silahkan tunggu konfirmasi dari admin</b></h6>
                    <hr>
                    <p align="center" style="color: green;">Note : Jika dalam kurun 24 jam belum dikonfirmasi, anda boleh menghubungi kami</p>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal"><b>Dimengerti</b></button>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal Alert Sukses -->

</main>

<?= $this->endSection(); ?>