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
                            <a href="<?= base_url('/admin/ProdukKue'); ?>">Produk Kue</a>
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
                                <h4 class="card-title">Produk Kue</h4>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary mb-4" style="width: 250px; margin-left:10px;" data-bs-toggle="modal" data-bs-target="#modaltambah">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                    Tambah Produk Kue
                                </button>
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jenis</th>
                                                <th>Kategori</th>
                                                <th>harga (Rp)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jenis</th>
                                                <th>Kategori</th>
                                                <th>harga (Rp)</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($kue_list as $kue) : ?>
                                                <tr>
                                                    <td><?= $kue['nama']; ?></td>
                                                    <td><?= $kue['jenis']; ?></td>
                                                    <td><?= str_replace('BoxPlastik', 'Box Plastik', $kue['kategori']); ?></td>
                                                    <td><?= number_format($kue['harga'], 0, ',', '.'); ?></td>
                                                    <td align="center">
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1<?= $kue['id_kue']; ?>">
                                                            <span class="btn-label">
                                                                <i class="fa-solid fa-circle-info"></i>
                                                            </span>
                                                            Detail
                                                        </button>
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal4<?= $kue['id_kue']; ?>">
                                                            <span class="btn-label">
                                                                <i class="fa-solid fa-image"></i>
                                                            </span>
                                                            Gambar Footer
                                                        </button>
                                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#alertHapusKue<?= $kue['id_kue']; ?>">
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

<!-- Modal Detail -->
<?php foreach ($kue_list as $kue) : ?>
    <div class="modal fade" id="modal1<?= $kue['id_kue']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1<?= $kue['id_kue']; ?>"><b>Detail Produk Kue</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h5><b>Nama</b></h5>
                            <h5><?= $kue['nama']; ?></h5>
                        </div>
                        <div class="col">
                            <h5><b>Slug</b></h5>
                            <h5><?= $kue['slug']; ?></h5>
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col">
                            <h5><b>Jenis</b></h5>
                            <h5><?= $kue['jenis']; ?></h5>
                        </div>
                        <div class="col">
                            <h5><b>Kategori</b></h5>
                            <h5><?= str_replace('BoxPlastik', 'Box Plastik', $kue['kategori']); ?></h5>
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col">
                            <h5><b>Harga (Rp)</b></h5>
                            <h5><?= number_format($kue['harga'], 0, ',', '.'); ?></h5>
                        </div>
                        <div class="col">
                            <h5><b>Berat</b></h5>
                            <h5><?= $kue['berat']; ?></h5>
                        </div>
                    </div>
                    <p></p>
                    <h5><b>Deskripsi</b></h5>
                    <h5><?= $kue['deskripsi']; ?></h5>
                    <hr>
                    <p></p>
                    <div class="row">
                        <div class="col">
                            <h5><b>Foto Utama</b></h5>
                            <h5 align="center"><img src="/image/upload/kue/<?= $kue['gambar']; ?>" alt="Deskripsi gambar" style="max-width: 180px; max-height: 180px;"></h5>
                        </div>
                        <div class="col">
                            <p align="center" style="margin-top: 60px;">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal2<?= $kue['id_kue']; ?>" data-bs-dismiss="modal">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-pencil"></i>
                                    </span>
                                    Edit
                                </button>
                            </div>
                            </p>
                            <p align="center">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal3<?= $kue['id_kue']; ?>">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-image"></i>
                                    </span>
                                    Ganti Foto
                                </button>
                            </div>
                            </p>
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

<!-- Modal Edit -->
<?php foreach ($kue_list as $kue) : ?>
    <div class="modal fade" id="modal2<?= $kue['id_kue']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel<?= $kue['id_kue']; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel<?= $kue['id_kue']; ?>"><b>Edit Produk Kue</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/admin/kue/update/' . $kue['id_kue']); ?>" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nama<?= $kue['id_kue']; ?>" name="nama" placeholder="Nama" value="<?= $kue['nama']; ?>" required>
                                        <label for="nama<?= $kue['id_kue']; ?>">Nama Produk Kue</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="jenis<?= $kue['id_kue']; ?>" name="jenis" aria-label="Floating label select example" required>
                                            <option value="">= Pilih Jenis =</option>
                                            <option value="Kering" <?= $kue['jenis'] == 'Kering' ? 'selected' : '' ?>>Kering</option>
                                            <option value="Basah" <?= $kue['jenis'] == 'Basah' ? 'selected' : '' ?>>Basah</option>
                                        </select>
                                        <label for="jenis<?= $kue['id_kue']; ?>">Jenis</label>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="berat<?= $kue['id_kue']; ?>" name="berat" value="<?= $kue['berat']; ?>" placeholder="Berat" required>
                                        <label for="berat<?= $kue['id_kue']; ?>">Berat</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" id="kategori<?= $kue['id_kue']; ?>" name="kategori" aria-label="Floating label select example" required>
                                            <option value="">= Pilih Opsi =</option>
                                            <?php if ($kue['jenis'] == 'Kering') : ?>
                                                <option value="Reguler" <?= $kue['kategori'] == 'Reguler' ? 'selected' : '' ?>>Reguler</option>
                                                <option value="JAR" <?= $kue['kategori'] == 'JAR' ? 'selected' : '' ?>>JAR</option>
                                                <option value="Kotak" <?= $kue['kategori'] == 'Kotak' ? 'selected' : '' ?>>Kotak</option>
                                            <?php elseif ($kue['jenis'] == 'Basah') : ?>
                                                <option value="BoxPlastik" <?= $kue['kategori'] == 'BoxPlastik' ? 'selected' : '' ?>>BoxPlastik</option>
                                                <option value="Mini" <?= $kue['kategori'] == 'Mini' ? 'selected' : '' ?>>Mini</option>
                                            <?php endif; ?>
                                        </select>
                                        <label for="kategori<?= $kue['id_kue']; ?>">Kategori</label>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi<?= $kue['id_kue']; ?>" style="height: 200px" required><?= $kue['deskripsi']; ?></textarea>
                                <label for="deskripsi<?= $kue['id_kue']; ?>">Deskripsi</label>
                            </div>
                            <p></p>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="harga<?= $kue['id_kue']; ?>" name="harga" value="<?= $kue['harga']; ?>" placeholder="Harga" required>
                                        <label for="harga<?= $kue['id_kue']; ?>">Harga</label>
                                    </div>
                                </div>
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal1<?= $kue['id_kue']; ?>" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const firstSelect<?= $kue['id_kue']; ?> = document.getElementById('jenis<?= $kue['id_kue']; ?>');
            const secondSelect<?= $kue['id_kue']; ?> = document.getElementById('kategori<?= $kue['id_kue']; ?>');

            // Fungsi untuk memperbarui dropdown kategori
            function updateKategoriSelect(selectedJenis) {
                secondSelect<?= $kue['id_kue']; ?>.innerHTML = '';

                if (selectedJenis === 'Kering') {
                    const options = ['Reguler', 'JAR', 'Kotak'];
                    options.forEach(option => {
                        const isSelected = option === '<?= $kue['kategori']; ?>';
                        secondSelect<?= $kue['id_kue']; ?>.options.add(new Option(option, option, isSelected, isSelected));
                    });
                } else if (selectedJenis === 'Basah') {
                    const options = ['BoxPlastik', 'Mini'];
                    options.forEach(option => {
                        const isSelected = option === '<?= $kue['kategori']; ?>';
                        secondSelect<?= $kue['id_kue']; ?>.options.add(new Option(option, option, isSelected, isSelected));
                    });
                }
            }

            // Event listener untuk perubahan pada dropdown jenis
            firstSelect<?= $kue['id_kue']; ?>.addEventListener('change', function() {
                updateKategoriSelect(firstSelect<?= $kue['id_kue']; ?>.value);
            });

            // Memastikan dropdown kategori terpilih berdasarkan nilai awal jenis
            updateKategoriSelect(firstSelect<?= $kue['id_kue']; ?>.value);
        });
    </script>
<?php endforeach; ?>
<!-- End Modal Edit -->

<!-- Modal Change Photo -->
<?php foreach ($kue_list as $kue) : ?>
    <div class=" modal fade" id="modal3<?= $kue['id_kue']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal3<?= $kue['id_kue']; ?>"><b>Ganti Foto Kue</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/admin/kue/change/' . $kue['id_kue']); ?>" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <h5 align="center" align="center"><img src="/image/upload/kue/<?= $kue['gambar']; ?>" alt="Deskripsi gambar" style="max-width: 180px; max-height: 180px;"></h5>
                            <hr>
                            <div class="col">
                                <h5>Pilih Foto Baru</h5>
                                <input type="file" class="form-control" id="change" name="change" placeholder="changegambar" required>
                            </div>
                            <p></p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <input type="hidden" id="slug" name="slug" value="<?= $kue['slug']; ?>">
                                <button class="btn btn-primary" type="submit">Change Photo</button>
                            </div>
                            <p></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal1<?= $kue['id_kue']; ?>" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Change Photo -->

<!-- Modal Gambar Footer -->
<?php foreach ($kue_list as $kue_item) : ?>
    <div class="modal fade" id="modal4<?= $kue_item['id_kue']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Gambar Footer <?= $kue_item['nama']; ?></b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <?php if (!empty($kue_pict[$kue_item['id_kue']])) : ?>
                                <?php foreach ($kue_pict[$kue_item['id_kue']] as $gambar) : ?>
                                    <div class="col-md-6 mb-6 mt-3">
                                        <img src="/image/upload/pictures/<?= $gambar['file']; ?>" alt="Kue" class="img-fluid">
                                        <div class="text-center mt-2">
                                            <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#gantiPict<?= $gambar['id_pict']; ?>">Ganti Gambar</button>
                                            <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#alertHapus<?= $gambar['id_pict']; ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p align="center">Belum ada gambar</p>
                            <?php endif; ?>
                        </div>
                        <p></p>
                        <div class="row">
                            <?php
                            $jumlah_gambar = !empty($kue_pict[$kue_item['id_kue']]) ? count($kue_pict[$kue_item['id_kue']]) : 0;
                            if ($jumlah_gambar < 4) : ?>
                                <div class="d-grid gap-2 col-6 mx-auto mb-3">
                                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#tambahPict<?= $kue_item['id_kue']; ?>">Tambah Gambar</button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <p><b>Note : Maksimal hanya 4 gambar footer</b></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Gambar Footer -->

<!-- Modal Tambah Gambar Footer -->
<?php foreach ($kue_list as $kue_item) : ?>
    <div class="modal fade" id="tambahPict<?= $kue_item['id_kue']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Tambah Gambar Footer</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <form action="<?= base_url('/admin/kue/addPicture/' . $kue_item['id_kue']); ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="newFooter" class="form-label">Pilih Gambar</label>
                                    <input type="file" class="form-control" id="newFooter" name="newFooter" required>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="hidden" name="slug" value="<?= $kue_item['slug']; ?>">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal4<?= $kue_item['id_kue']; ?>" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Tambah Gambar Footer -->

<!-- Modal Ganti Gambar Footer -->
<?php foreach ($pictures as $gambar) : ?>
    <div class="modal fade" id="gantiPict<?= $gambar['id_pict']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiPictLabel<?= $gambar['id_pict']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiPictLabel<?= $gambar['id_pict']; ?>"><b>Ganti Gambar Footer</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="<?= base_url('/admin/kue/changePicture/' . $gambar['id_pict']); ?>" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <h5 align="center" align="center"><img src="/image/upload/pictures/<?= $gambar['file']; ?>" alt="Deskripsi gambar" style="max-width: 180px; max-height: 180px;"></h5>
                                <hr>
                                <div class="col">
                                    <h5>Pilih Gambar Baru</h5>
                                    <input type="file" class="form-control" id="change" name="change" placeholder="changegambar" required>
                                </div>
                                <p></p>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="hidden" id="slug" name="slug" value="<?= $kue['slug']; ?>">
                                    <button class="btn btn-primary" type="submit">Change Photo</button>
                                </div>
                                <p></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal4<?= $gambar['id_kue']; ?>" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Tambah Gambar Footer -->

<!-- Modal Hapus Gambar Footer -->
<?php foreach ($pictures as $gambar) : ?>
    <div class="modal fade" id="alertHapus<?= $gambar['id_pict']; ?>" tabindex="-1" aria-labelledby="alertHapus<?= $gambar['id_pict']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apakah Anda yakin ingin menghapus ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal4<?= $gambar['id_kue']; ?>" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/kue/deletePicture/' . $gambar['id_pict']) ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Hapus Gambar Footer -->

<!-- Modal Hapus Kue -->
<?php foreach ($kue_list as $kue) : ?>
    <div class="modal fade" id="alertHapusKue<?= $kue['id_kue']; ?>" tabindex="-1" aria-labelledby="alertHapus<?= $kue['id_kue']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: black;">Apakah Anda yakin ingin menghapus Produk Kue berserta Gambar Footer nya ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('/admin/kue/deleteKue/' . $kue['id_kue']) ?>" style="text-decoration: none;">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Iya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Hapus Kue -->

<!-- Modal Tambah -->
<div class=" modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambah"><b>Tambah Produk Kue</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/kue/insert'); ?>" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
                                    <label for="nama">Nama Produk Kue</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="firstSelect" name="jenis" onchange="updateSecondSelect()" aria-label="Floating label select example" required>
                                        <option selected>= Pilih Jenis =</option>
                                        <option value="Kering">Kering</option>
                                        <option value="Basah">Basah</option>
                                    </select>
                                    <label for="firstSelect">Jenis</label>
                                </div>
                            </div>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="berat" name="berat" placeholder="berat" required>
                                    <label for="berat">Berat</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="secondSelect" name="kategori" aria-label="Floating label select example" required>
                                        <select id="secondSelect" name="tipe">
                                        </select>
                                    </select>
                                    <label for="secondSelect">Kategori</label>
                                </div>
                            </div>
                        </div>
                        <p></p>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi" style="height: 200px" required></textarea>
                            <label for="deskripsi">Deskripsi</label>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="harga" name="harga" placeholder="harga" required>
                                    <label for="harga">Harga</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="gambar" required>
                                    <label for="gambar">Gambar Produk Kue</label>
                                </div>
                            </div>
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
<script>
    function updateSecondSelect() {
        const firstSelect = document.getElementById("firstSelect");
        const secondSelectContainer = document.getElementById("secondSelectContainer");
        const secondSelect = document.getElementById("secondSelect");
        const selectedValue = firstSelect.value;

        secondSelect.innerHTML = "";

        const options = {
            Kering: ["Reguler", "JAR", "Kotak"],
            Basah: ["BoxPlastik", "Mini"]
        };

        if (options[selectedValue]) {
            options[selectedValue].forEach(option => {
                const newOption = document.createElement("option");
                newOption.value = option;
                newOption.textContent = option;
                secondSelect.appendChild(newOption);
            });
            secondSelectContainer.style.display = "block";
        } else {
            secondSelectContainer.style.display = "none";
        }
    }
</script>
<!-- End Modal Tambah -->

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