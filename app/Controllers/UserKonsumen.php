<?php

namespace App\Controllers;

use App\Models\KonsumenModel;
use App\Models\PesanModel;
use CodeIgniter\API\ResponseTrait;

class UserKonsumen extends BaseController
{
    use ResponseTrait;

    protected $KonsumenModel;
    protected $PesanModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->KonsumenModel = new KonsumenModel();
        $this->PesanModel = new PesanModel();
    }

    public function konsumen()
    {
        $session = session();

        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'konsumen' => $this->KonsumenModel->getAll()
        ];

        return view('admin/UserKonsumen', $data);
    }

    public function Delete($id_konsumen)
    {
        $session = session();
        $result = $this->KonsumenModel->deleteKonsumen($id_konsumen);

        if ($result) {
            $session->setFlashdata('success', 'Akun berhasil dihapus!');
        } else {
            $session->setFlashdata('error', 'Akun gagal dihapus!');
        }

        return redirect()->back();
    }

    public function resetPassword($id_konsumen)
    {
        $session = session();

        $username = $this->request->getPost('username');
        $user = $this->KonsumenModel->where('username', $username)->where('id_konsumen', $id_konsumen)->first();

        if ($user) {
            $newPassword = $this->generateRandomPassword();
            $user['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->KonsumenModel->save($user);

            $this->sendPasswordResetEmail($user['email'], $newPassword);

            $session->setFlashdata('success', 'Akun berhasil direset password, password baru dikirim melalui email ' . $user['email']);
            // $session->setFlashdata('success', 'Akun berhasil direset password, password baru adalah username dari User ' . $user['fullname']);
            return redirect()->to('/admin/UKonsumen');
        } else {
            $session->setFlashdata('error', 'Username salah atau tidak ditemukan !');
            return redirect()->to('/admin/UKonsumen');
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
}
