<?php

namespace App\Controllers;

use App\Models\MetodeTransaksiModel;
use CodeIgniter\API\ResponseTrait;

class MetodeTransaksi extends BaseController
{
    use ResponseTrait;

    protected $MetodeTransaksiModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->MetodeTransaksiModel = new MetodeTransaksiModel();
    }

    public function insertMTrans()
    {
        $session = session();

        $data = [
            'metode' => $this->request->getVar('metode'),
            'kode' => $this->request->getVar('kode')
        ];

        $result =  $this->MetodeTransaksiModel->insert($data);

        if ($result) {
            $session->setFlashdata('success', 'Data metode transaksi berhasil ditambahkan !');
        } else {
            $session->setFlashdata('error', 'Data metode transaksi gagal ditambahkan !');
        }
        return redirect()->to('/admin/MTransaksi');
    }

    public function updateMTrans($id_transaksi)
    {
        $session = session();

        $data = [
            'metode' => $this->request->getVar('metode'),
            'kode' => $this->request->getVar('kode')
        ];

        $result =  $this->MetodeTransaksiModel->update($id_transaksi, $data);

        if ($result) {
            $session->setFlashdata('success', 'Metode transaksi berhasil diupdate !');
        } else {
            $session->setFlashdata('error', 'Metode transaksi gagal diupdate !');
        }
        return redirect()->to('/admin/MTransaksi');
    }

    public function deleteMTrans($id_transaksi)
    {
        $session = session();

        $result = $this->MetodeTransaksiModel->delete($id_transaksi);

        if ($result) {
            $session->setFlashdata('success', 'Metode Transaksi berhasil dihapus !');
        } else {
            $session->setFlashdata('error', 'Metode Transaksi gagal dihapus !');
        }
        return redirect()->to('/admin/MTransaksi');
    }
}
