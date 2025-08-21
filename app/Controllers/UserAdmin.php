<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PesanModel;
use CodeIgniter\API\ResponseTrait;

class UserAdmin extends BaseController
{
    use ResponseTrait;

    protected $AdminModel;
    protected $PesanModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->PesanModel = new PesanModel();
    }

    public function admin()
    {
        $session = session();

        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'admin' => $this->AdminModel->getAll()
        ];

        return view('admin/UserAdmin', $data);
    }

    public function insert()
    {
        $session = session();

        $password = $this->request->getVar('password');
        $Cpassword = $this->request->getVar('confirm_password');

        if ($password == $Cpassword) {
            $data = [
                'nama' => $this->request->getVar('nama'),
                'nik' => $this->request->getVar('nik'),
                'jenkel' => $this->request->getVar('jenkel'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'alamat' => $this->request->getVar('alamat'),
                'phone' => $this->request->getVar('phone'),
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];

            if ($this->AdminModel->insert($data)) {
                $session->setFlashdata('success', 'Akun Admin berhasil di daftarkan !');
            } else {
                $session->setFlashdata('error', 'Akun Admin gagal di daftarkan !');
            }

            return redirect()->to('/admin/UAdmin');
        } else {
            $session->setFlashdata('error', 'Confirm Password tidak sesuai dengan Password, harap ulangi lagi');
            return redirect()->to('/admin/UAdmin');
        };
    }

    public function resetPassword($id_admin)
    {
        $session = session();

        $username = $this->request->getPost('username');
        $user = $this->AdminModel->where('username', $username)->where('id_admin', $id_admin)->first();

        if ($user) {
            $newPassword = $this->generateRandomPassword();
            $user['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->AdminModel->save($user);

            $this->sendPasswordResetEmail($user['email'], $newPassword);

            $session->setFlashdata('success', 'Akun berhasil direset password, password baru dikirim melalui email ' . $user['email']);
            // $session->setFlashdata('success', 'Akun berhasil direset password, password baru adalah username dari User ' . $user['fullname']);
            return redirect()->to('/admin/UAdmin');
        } else {
            $session->setFlashdata('error', 'Username salah atau tidak ditemukan !');
            return redirect()->to('/admin/UAdmin');
        }
    }

    private function generateRandomPassword($length = 6)
    {
        return random_int(100000, 999999);
    }

    private function sendPasswordResetEmail($to, $newPassword)
    {
        $email = \Config\Services::email();

        $email->setFrom('fajamaulana1010@gmail.com', 'WULAN Cookies & Cake');
        $email->setTo($to);
        $email->setSubject('Reset Password');
        $email->setMessage("Password baru Anda adalah: $newPassword");

        if ($email->send()) {
            return true;
        } else {
            echo $email->printDebugger(['headers']);
            return false;
        }
    }

    public function Delete($id_admin)
    {
        $session = session();
        $result = $this->AdminModel->deleteKonsumen($id_admin);

        if ($result) {
            $session->setFlashdata('success', 'Akun berhasil dihapus!');
        } else {
            $session->setFlashdata('error', 'Akun gagal dihapus!');
        }

        return redirect()->to('/admin/UAdmin');
    }

    public function profil()
    {
        $session = session();

        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan')
        ];

        return view('admin/profil', $data);
    }

    public function updateProfile($id_konsumen)
    {
        $session = session();

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'nik'        => $this->request->getVar('nik'),
            'jenkel'     => $this->request->getVar('jenkel'),
            'tgl_lahir'  => $this->request->getVar('tgl_lahir'),
            'alamat'     => $this->request->getVar('alamat'),
            'phone'      => $this->request->getVar('phone'),
            'email'      => $this->request->getVar('email')
        ];

        if ($this->AdminModel->update($id_konsumen, $data)) {
            $sessionData = [
                'nama'       => $data['nama'],
                'nik'        => $data['nik'],
                'jenkel'     => $data['jenkel'],
                'tgl_lahir'  => $data['tgl_lahir'],
                'alamat'     => $data['alamat'],
                'phone'      => $data['phone'],
                'email'      => $data['email']
            ];
            $session->set($sessionData);

            $session->setFlashdata('success', 'Profil berhasil diperbarui !');
        } else {
            $session->setFlashdata('error', 'Gagal memperbarui profil !');
        }

        return redirect()->to('/admin/Profil');
    }

    public function updateUsername()
    {
        $session = session();

        $oldUsername = $this->request->getPost('oldusername');
        $newUsername = $this->request->getPost('newusername');

        $currentUsername = $session->get('username');
        if ($oldUsername != $currentUsername) {
            $session->setFlashdata('error', 'Username lama tidak sesuai dengan yang sedang login !');
            return redirect()->back();
        }

        $data = [
            'username' => $newUsername
        ];

        $result = $this->AdminModel->update($session->get('id_admin'), $data);

        if ($result) {
            $session->set('username', $newUsername);

            $session->setFlashdata('success', 'Username berhasil diperbarui !');
        } else {
            $session->setFlashdata('error', 'Gagal memperbarui username !');
        }

        return redirect()->to('/admin/Profil');
    }

    public function updatePassword()
    {
        $session = session();

        $id_admin = $session->get('id_admin');
        $oldPassword = $this->request->getVar('oldpassword');
        $newPassword = $this->request->getVar('newpassword');
        $confirmPassword = $this->request->getVar('Cpassword');

        $admin = $this->AdminModel->find($id_admin);

        if (!$admin || !password_verify($oldPassword, $admin['password'])) {
            $session->setFlashdata('error', 'Password lama salah !');
            return redirect()->to('/admin/Profil');
        }

        if ($newPassword !== $confirmPassword) {
            $session->setFlashdata('error', 'Konfirmasi password baru tidak sesuai !');
            return redirect()->to('/admin/Profil');
        }

        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $data = [
            'password' => $newHashedPassword
        ];

        $this->AdminModel->update($id_admin, $data);

        $session->setFlashdata('success', 'Password berhasil diperbarui !');
        return redirect()->to('/admin/Profil');
    }
}
