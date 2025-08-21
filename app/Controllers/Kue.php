<?php

namespace App\Controllers;

use App\Models\KueModel;
use App\Models\PicturesModel;
use CodeIgniter\API\ResponseTrait;

class Kue extends BaseController
{
    use ResponseTrait;

    protected $KueModel;
    protected $PicturesModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->KueModel = new KueModel();
        $this->PicturesModel = new PicturesModel();
    }

    public function insertKue()
    {
        $session = session();

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (in_array($gambar->getMimeType(), $allowedTypes)) {
                $newName = $slug . '.' . $gambar->getClientExtension();
                $gambar->move('image/upload/kue/', $newName);

                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'slug' => $slug,
                    'jenis' => $this->request->getVar('jenis'),
                    'kategori' => $this->request->getVar('kategori'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'harga' => $this->request->getVar('harga'),
                    'berat' => $this->request->getVar('berat'),
                    'gambar' => $newName
                ];

                $this->KueModel->insert($data);

                $session->setFlashdata('success', 'Data kue berhasil ditambahkan !');
                return redirect()->to('/admin/ProdukKue');
            }
        } else {
            $session->setFlashdata('error', 'Gagal menambahkan data kue !');
            return redirect()->to('/admin/ProdukKue');
        }
    }

    public function updateKue($id_kue)
    {
        $session = session();

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data = [
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'jenis' => $this->request->getVar('jenis'),
            'kategori' => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga' => $this->request->getVar('harga'),
            'berat' => $this->request->getVar('berat')
        ];

        $result = $this->KueModel->update($id_kue, $data);

        if ($result) {
            $session->setFlashdata('success', 'Data kue berhasil diupdate !');
        } else {
            $session->setFlashdata('error', 'Data kue gagal diupdate !');
        }
        return redirect()->to('/admin/ProdukKue');
    }

    public function changeFotoKue($id_kue)
    {
        $session = session();

        $find = $this->KueModel->find($id_kue);

        $slug = $this->request->getVar('slug');
        $gambar = $this->request->getFile('change');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (in_array($gambar->getMimeType(), $allowedTypes)) {
                // Hapus file lama jika ada
                if ($this->KueModel && !empty($find['gambar'])) {
                    $oldFile = 'image/upload/kue/' . $find['gambar'];
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }
                $newName = $slug . '.' . $gambar->getClientExtension();
                $gambar->move('image/upload/kue/', $newName);

                $data = [
                    'gambar' => $newName
                ];

                $this->KueModel->where('id_kue', $id_kue)->set($data)->update();

                $session->setFlashdata('success', 'Foto produk kue berhasil diganti !');
                return redirect()->to('/admin/ProdukKue');
            }
        } else {
            $session->setFlashdata('error', 'Foto produk kue gagal diganti !');
            return redirect()->to('/admin/ProdukKue');
        }
    }

    public function addPictureImage($id_kue)
    {
        $session = session();

        $gambar = $this->request->getFile('newFooter');
        $slug = $this->request->getVar('slug');

        $randomNumber = mt_rand(100, 999);

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (in_array($gambar->getMimeType(), $allowedTypes)) {
                $newName = $slug . '_' . $randomNumber . '.' . $gambar->getClientExtension();
                $gambar->move('image/upload/pictures/', $newName);

                $data = [
                    'id_kue' => $id_kue,
                    'file' => $newName
                ];

                $this->PicturesModel->insert($data);

                $session->setFlashdata('success', 'Gambar footer berhasil ditambahkan !');
                return redirect()->to('/admin/ProdukKue');
            }
        } else {
            $session->setFlashdata('error', 'Gagal menambahkan gambar footer !');
            return redirect()->to('/admin/ProdukKue');
        }
    }

    public function ChangePicture($id_pict)
    {
        $session = session();

        $find = $this->PicturesModel->find($id_pict);

        $gambar = $this->request->getFile('change');
        $slug = $this->request->getVar('slug');

        $randomNumber = mt_rand(100, 999);

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (in_array($gambar->getMimeType(), $allowedTypes)) {
                // Hapus file lama jika ada
                if ($this->PicturesModel && !empty($find['file'])) {
                    $oldFile = 'image/upload/pictures/' . $find['file'];
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }
                $newName = $slug . '_' . $randomNumber . '.' . $gambar->getClientExtension();
                $gambar->move('image/upload/pictures/', $newName);

                $data = [
                    'file' => $newName
                ];

                $this->PicturesModel->where('id_pict', $id_pict)->set($data)->update();

                $session->setFlashdata('success', 'Gambar footer berhasil diganti !');
                return redirect()->to('/admin/ProdukKue');
            }
        } else {
            $session->setFlashdata('success', 'Gambar footer gagal diganti !');
            return redirect()->to('/admin/ProdukKue');
        }
    }

    public function deletePicture($id_pict)
    {
        $session = session();
        $picture = $this->PicturesModel->find($id_pict);

        if (!$picture) {
            return redirect()->back()->with('error', 'Picture tidak ditemukan.');
        }

        $filePath = 'image/upload/pictures/' . $picture['file'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $result = $this->PicturesModel->delete($id_pict);

        if ($result) {
            $session->setFlashdata('success', 'Picture berhasil dihapus !');
        } else {
            $session->setFlashdata('error', 'Picture gagal dihapus !');
        }
        return redirect()->to('/admin/ProdukKue');
    }

    public function deleteKue($id_kue)
    {
        $session = session();
        $result = $this->PicturesModel->deleteKue($id_kue);

        if ($result) {
            $session->setFlashdata('success', 'Produk Kue berhasil dihapus !');
        } else {
            $session->setFlashdata('error', 'Produk Kue gagal dihapus !');
        }
        return redirect()->to('/admin/ProdukKue');
    }
}
