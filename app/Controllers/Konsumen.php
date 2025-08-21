<?php

namespace App\Controllers;

use App\Models\KonsumenModel;
use CodeIgniter\API\ResponseTrait;

class Konsumen extends BaseController
{
    use ResponseTrait;

    protected $KonsumenModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->KonsumenModel = new KonsumenModel();
    }

    public function register()
    {
        $session = session();

        $fullname = $this->request->getPost('fullname');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $alamat = $this->request->getPost('alamat');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return $this->fail('Username dan password harus diisi.');
        }

        if (!is_string($username) || !is_string($password)) {
            return $this->fail('Input tidak valid.');
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $this->KonsumenModel->save([
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'alamat' => $alamat,
            'username' => $username,
            'password' => $hashedPassword
        ]);

        $session->setFlashdata('showModalRegister', true);
        $session->setFlashdata('msg', '
        <div class="alert alert-warning" role="alert">
            Register berharsil, silahkan login !
        </div>');

        return redirect()->back();
    }

    public function viewProfil(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Profil'
        ];

        return view('konsumen/profil', $data);
    }

    public function updateProfile()
    {
        $session = session();
        $userId = $session->get('id_konsumen');

        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $this->KonsumenModel->update($userId, $data);

        $session->set([
            'fullname' => $data['fullname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'alamat' => $data['alamat']
        ]);

        $session->setFlashdata('alertProfil', true);
        $session->setFlashdata('msg', '
                <div class="alert alert-primary" role="alert">
                Profil berhasil diperbarui !
                </div>');
        return redirect()->to('/konsumen/profil');
    }

    public function changeUsername()
    {
        $session = session();
        $userId = $session->get('id_konsumen');
        $currentUsername = $session->get('username');

        $oldUsername = $this->request->getPost('old_username');
        if ($oldUsername !== $currentUsername) {
            $session->setFlashdata('alertProfil', true);
            $session->setFlashdata('msg', '
                    <div class="alert alert-danger" role="alert">
                    Username lama tidak cocok dengan username saat ini !
                    </div>');
            return redirect()->to('/konsumen/profil');
        }

        $newUsername = $this->request->getPost('new_username');

        $this->KonsumenModel->update($userId, ['username' => $newUsername]);

        $session->set('username', $newUsername);

        $session->setFlashdata('alertProfil', true);
        $session->setFlashdata('msg', '
                <div class="alert alert-primary" role="alert">
                Username berhasil diperbarui !
                </div>');
        return redirect()->to('/konsumen/profil');
    }

    public function changePassword()
    {
        $session = session();
        $userId = $session->get('id_konsumen');

        $user = $this->KonsumenModel->find($userId);
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($newPassword != $confirmPassword) {
            $session->setFlashdata('alertProfil', true);
            $session->setFlashdata('msg', '
                    <div class="alert alert-warning" role="alert">
                    Confirm password tidak sama dengan password baru !
                    </div>');
            return redirect()->to('/konsumen/profil');
        }

        if (is_null($oldPassword) || !is_string($oldPassword)) {
            $session->setFlashdata('alertProfil', true);
            $session->setFlashdata('msg', '
                    <div class="alert alert-danger" role="alert">
                    Password lama tidak valid !
                    </div>');
            return redirect()->to('/konsumen/profil');
        }

        if (!password_verify($oldPassword, $user['password'])) {
            $session->setFlashdata('alertProfil', true);
            $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                Password lama tidak cocok !
                </div>');
            return redirect()->to('/konsumen/profil');
        }

        // Hash the new password
        if (is_null($newPassword) || !is_string($newPassword)) {
            $session->setFlashdata('alertProfil', true);
            $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                Password baru tidak valid !
                </div>');
            return redirect()->to('/konsumen/profil');
        }
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $this->KonsumenModel->update($userId, ['password' => $hashedPassword]);

        $session->setFlashdata('alertProfil', true);
        $session->setFlashdata('msg', '
                <div class="alert alert-primary" role="alert">
                Password berhasil diperbarui !
                </div>');
        return redirect()->to('/konsumen/profil');
    }
}
