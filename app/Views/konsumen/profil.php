<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section" style="padding: 3.5rem 0; background: linear-gradient(to right, rgb(31 31 27 / 80%) 0%, rgb(62 76 63 / 80%) 100%), url(/image/img/kue_back.jpg);">
    <h5 style="margin-top:40px; margin-left:150px;">
        <a href="<?= base_url(); ?>" style="color:lavender;"><i class="bx bxs-home"></i> Home</a>
        <span style="color:lime;">/ Profil Saya</span>
    </h5>
</section>

<main id="main">
    <section class="section cta-section" style="display: flex; padding: 0rem 0; background-color:whitesmoke;">
        <div class="container mx-auto mt-4 mb-4">
            <div class="row" style="background-color: white; padding:20px;">
                <div class="col-8" data-aos="fade-right">
                    <div class="container">
                        <h3>Nama Lengkap</h3>
                        <h4 style="color: green;"><?= session('fullname') ?></h4>
                        <br>
                        <h3>Nomor Telephone</h3>
                        <h4 style="color: green;"><?= session('phone') ?></h4>
                        <br>
                        <h3>Email</h3>
                        <h4 style="color: green;"><?= session('email') ?></h4>
                        <br>
                        <h3>Alamat</h3>
                        <h4 style="color: green;"><?= session('alamat') ?></h4>
                        <br>
                    </div>
                </div>
                <div class="col-4" data-aos="fade-left">
                    <div class="container" style="padding:20px;" align="center">
                        <div class="d-grid gap-2">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProf" type="button" style="background-color: gold; color:black; font-size:larger;">
                                <i class="bi bi-pencil"></i> <b>Edit Profil</b>
                            </button>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#changeProf" type="button" style="background-color:lightgreen; color:black; font-size:larger;">
                                <i class="bi bi-shield-lock-fill"></i> <b>Change Username & Password</b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Edit Profil -->
    <div class="modal fade" id="editProf" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProf" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editProf">Edit Profil <i class="bi bi-pencil"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/konsumen/profil/update') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="1" name="fullname" placeholder="Nama Lengkap" value="<?= session('fullname') ?>" required>
                            <label for="1">Nama Lengkap</label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="2" name="phone" placeholder="Nomor Telephone" value="<?= session('phone') ?>" required>
                                    <label for="2">Nomor Telephone</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="3" name="email" placeholder="Email" value="<?= session('email') ?>" required>
                                    <label for="3">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Alamat" id="4" name="alamat" style="height: 120px" required><?= session('alamat') ?></textarea>
                            <label for="4">Alamat</label>
                        </div>
                        <br>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" align="center" class="btn btn-primary btn-sm" name="submit" value="submit"><b>Update Profil</b></button>
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal Edit Profil -->

    <!-- Modal Change -->
    <div class="modal fade" id="changeProf" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changeProf" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="changeProf">Change Username & Password <i class="bi bi-shield-lock-fill"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 style="color: blue;"><b>Ganti Username</b></h5>
                    <form action="<?= base_url('/konsumen/profil/changeUsername') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="old_username" placeholder="Username" required>
                            <label for="username">Masukkan username lama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="newusername" name="new_username" placeholder="newUsername" required>
                            <label for="newusername">Masukkan username baru</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" align="center" class="btn btn-info btn-sm" name="submit" value="submit"><b>Change Username</b></button>
                        </div>
                    </form>
                    <br>
                    <hr style="border: 2px solid black; height: 0;">
                    <h5 style="color: gold;"><b>Ganti Password</b></h5>
                    <form action="<?= base_url('/konsumen/profil/changePassword') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="old_password" placeholder="Password" required>
                            <label for="password">Password lama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="newpassword" name="new_password" placeholder="newPassword" required>
                            <label for="newpassword">Password baru</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="trynewpassword" name="confirm_password" placeholder="trynewpassword" required>
                            <label for="trynewpassword">Confirm password baru</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" align="center" class="btn btn-warning btn-sm" name="submit" value="submit"><b>Update Password</b></button>
                        </div>
                    </form>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal Change -->

    <!-- Modal Alert -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('alertProfil')) : ?>
                var modal = new bootstrap.Modal(document.getElementById('alertProfil'));
                modal.show();
            <?php endif; ?>
        });
    </script>
    <div class="modal fade" id="alertProfil" tabindex="-1" aria-labelledby="alertProfil" aria-hidden="true">
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

</main>

<?= $this->endSection(); ?>