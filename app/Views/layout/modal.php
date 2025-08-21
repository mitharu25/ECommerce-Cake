<!-- Modal From Controller -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->getFlashdata('showModal2')) : ?>
            var modal = new bootstrap.Modal(document.getElementById('editJumlah'));
            modal.show();
        <?php endif; ?>
    });
</script>
<div class="modal fade" id="editJumlah" tabindex="-1" aria-labelledby="editJumlah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJumlah">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Pembaruan berhasil! Silahkan cek keranjang</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"></button>
                <div class="centered-icon">
                    <i class="bi bi-person-circle" style="font-size: 70px; color:rgb(173, 208, 104);"></i>
                </div>
                <h3 align="center"><b>Login</b></h3>
                <br>
                <div class="form-container">
                    <form action="<?= base_url('auth/login') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username" style="border: 1px solid #4b3b09;" required>
                            <label for="floatingUsername">Username</label>
                        </div>
                        <div class="form-floating password-toggle">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" style="border: 1px solid #4b3b09;" required>
                            <label for="floatingPassword">Password</label>
                            <i class="bi bi-eye-slash toggle-password"></i>
                        </div>
                        <br>
                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-sm btn-customSubmit" type="submit" value="Login">Submit</button>
                        </div>
                    </form>
                    <p align="right"><a href="#" class="lupa-pass">Forgot Password</a></p>
                    <br>
                    <br>
                    <hr>
                    <p align="center" style="color: black;">Tidak punya akun? Silahkan <a role="button" style="color: blue;" data-bs-toggle="modal" data-bs-target="#modalDaftar" data-bs-dismiss="modal">Daftar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("floatingPassword");
        const togglePasswordButton = document.querySelector(".toggle-password");

        togglePasswordButton.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordButton.classList.remove("bi-eye-slash");
                togglePasswordButton.classList.add("bi-eye");
            } else {
                passwordInput.type = "password";
                togglePasswordButton.classList.remove("bi-eye");
                togglePasswordButton.classList.add("bi-eye-slash");
            }
        });
    });
</script>
<!-- End Modal Login -->

<!-- Modal Daftar -->
<div class="modal fade" id="modalDaftar" aria-hidden="true" aria-labelledby="modalDaftar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"></button>
                <h3 style="margin-top: 30px;" align="center"><b>Register Akun</b></h3>
                <hr>
                <div class="form-container">
                    <form action="<?= base_url('konsumen/register') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" placeholder="Fullname" style="border: 1px solid #4b3b09;" required>
                            <label for="fullname">Nama Lengkap</label>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <input type="text" class="form-control" id="phone" placeholder="No. HP (Aktif WA)" name="phone" style="border: 1px solid #4b3b09;" required>
                            </div>
                            <div class="col">
                                <input type="email" class="form-control" id="email" placeholder="Email (opsional)" name="email" style="border: 1px solid #4b3b09;" required>
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control form-control-sm" placeholder="Alamat Tempat Tinggal" id="alamat" name="alamat" style="height: 100px; border: 1px solid #4b3b09;" required></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                        <br>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" id="username" placeholder="Username" name="username" style="border: 1px solid #4b3b09;" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating password-toggle2">
                            <input type="password" class="form-control form-control-sm" id="floatingPassword2" placeholder="Password" name="password" style="border: 1px solid #4b3b09;" required>
                            <label for="floatingPassword2">Password</label>
                            <i class="bi bi-eye-slash toggle-password2"></i>
                        </div>
                        <br>
                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-sm btn-customSubmit" type="submit" value="Register">Submit</button>
                        </div>
                    </form>
                    <hr>
                    <p align="center" style="color: black;">Sudah punya akun, Silahkan kembali ke <a role="button" style="color: blue;" data-bs-target="#loginModal" data-bs-toggle="modal" data-bs-dismiss="modal">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("floatingPassword2");
        const togglePasswordButton = document.querySelector(".toggle-password2");

        togglePasswordButton.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordButton.classList.remove("bi-eye-slash");
                togglePasswordButton.classList.add("bi-eye");
            } else {
                passwordInput.type = "password";
                togglePasswordButton.classList.remove("bi-eye");
                togglePasswordButton.classList.add("bi-eye-slash");
            }
        });
    });
</script>
<!-- End Modal Daftar -->

<!-- Modal Alert -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->getFlashdata('showModalRegister')) : ?>
            var modal = new bootstrap.Modal(document.getElementById('registerSuccess'));
            modal.show();
        <?php endif; ?>
    });
</script>
<div class="modal fade" id="registerSuccess" tabindex="-1" aria-labelledby="registerSuccess" aria-hidden="true">
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
<!-- End Modal Alert -->

<!-- Modal Alert Login -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->getFlashdata('AlertLogin')) : ?>
            var modal = new bootstrap.Modal(document.getElementById('alertLogin'));
            modal.show();
        <?php endif; ?>
    });
</script>
<div class="modal fade" id="alertLogin" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="alertLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Notifikasi</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>
                    <div class="alert alert-info" role="alert">
                        Segera login untuk melanjutkan !
                    </div>
                </h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-sm" data-bs-target="#loginModal" data-bs-toggle="modal" data-bs-dismiss="modal"><b>Login</b></button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Alert Login -->