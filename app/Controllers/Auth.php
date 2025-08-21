<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KonsumenModel;

class Auth extends BaseController
{
    protected $AdminModel;
    protected $KonsumenModel;
    protected $helpers = ['url'];

    public function login()
    {
        $session = session();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $konsumen = new KonsumenModel();
        $data = $konsumen->where('username', $username)->first();

        $admin = new AdminModel();
        $data2 = $admin->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_konsumen'       => $data['id_konsumen'],
                    'fullname'     => $data['fullname'],
                    'phone'    => $data['phone'],
                    'email'    => $data['email'],
                    'alamat'    => $data['alamat'],
                    'username'    => $data['username'],
                    'password'    => $data['password'],
                    'isLoggedIn'     => TRUE,
                    'role' => 'konsumen'
                ];
                $session->set($ses_data);

                $session->setFlashdata('showModalRegister', true);
                $session->setFlashdata('msg', '
                <div class="alert alert-primary" role="alert">
                    Login Berhasil !
                </div>');
                return redirect()->back();
            } else {
                $session->setFlashdata('showModalRegister', true);
                $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                    Password salah, harap ulangi lagi !
                </div>');
                return redirect()->back();
            }
        } elseif ($data2) {
            $pass = $data2['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_admin' => $data2['id_admin'],
                    'nama' => $data2['nama'],
                    'nik' => $data2['nik'],
                    'jenkel' => $data2['jenkel'],
                    'tgl_lahir' => $data2['tgl_lahir'],
                    'alamat' => $data2['alamat'],
                    'phone' => $data2['phone'],
                    'email' => $data2['email'],
                    'username' => $data2['username'],
                    'password' => $data2['password'],
                    // 'isLoggedIn' => TRUE,
                    'isAdmin' => TRUE,
                    'role' => 'admin'
                ];
                $session->set($ses_data);

                $session->setFlashdata('showModalRegister', true);
                $session->setFlashdata('msg', '
                <div class="alert alert-primary" role="alert">
                    Login Berhasil !
                </div>');
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('showModalRegister', true);
                $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                    Password salah, harap ulangi lagi !
                </div>');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('showModalRegister', true);
            $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                    Username & Password salah, harap ulangi lagi !
                </div>');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        $session = session();
        $session->setFlashdata('showModalRegister', true);
        $session->setFlashdata('msg', '
            <div class="alert alert-primary" role="alert">
            Logout berhasil. Jangan lupa untuk kembali lagi !
            </div>');
        return redirect()->to(base_url('/'));
    }
}
