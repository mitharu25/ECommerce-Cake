<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\PayModel;
use App\Models\TransaksiModel;
use App\Models\DetailPesanModel;
use CodeIgniter\API\ResponseTrait;

class Payment extends BaseController
{
    use ResponseTrait;

    protected $HomeModel;
    protected $PayModel;
    protected $TransaksiModel;
    protected $DetailPesanModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->HomeModel = new HomeModel();
        $this->PayModel = new PayModel();
        $this->DetailPesanModel = new DetailPesanModel();
        $this->TransaksiModel = new TransaksiModel();
    }

    public function pay(): string
    {
        $productNamesString = $this->PayModel->getCartProduct();

        $session = session();
        $cart = $session->get('cart') ?? [];

        $data = [
            'cart' => $cart,
            'listorder' => $productNamesString,
            'title' => 'WLN Cake - Payment'
        ];

        return view('payment/pay', $data);
    }

    public function pesanan(): string
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        $id_user_konsumen = $session->get('id_konsumen');

        $orders = $this->PayModel->getOrdersByUserId($id_user_konsumen);

        $data = [
            'cart' => $cart,
            'order' => $orders,
            'transaksi' => $this->TransaksiModel->getTransaksi(),
            'title' => 'WLN Cake - Pesanan Saya'
        ];

        return view('payment/pesanan', $data);
    }

    public function createOrder()
    {
        $session = session();

        // Data untuk tabel pesan
        $id_user_konsumen = $this->request->getPost('id_user_konsumen');
        $total_harga = $this->request->getPost('total_harga');
        $this->PayModel->save([
            'id_user_konsumen' => $id_user_konsumen,
            'total_harga' => $total_harga
        ]);

        // Data untuk tabel detail_pesan
        $id_order = $this->PayModel->insertID();
        $nama = $this->request->getPost('nama');
        $phone = $this->request->getPost('phone');
        $alamat = $this->request->getPost('alamat');
        $produk = $this->request->getPost('produk');
        $total_produk = $this->request->getPost('total_produk');
        $total_harga = $this->request->getPost('total_harga');
        $this->DetailPesanModel->save([
            'id_order' => $id_order,
            'id_user_konsumen' => $id_user_konsumen,
            'nama' => $nama,
            'phone' => $phone,
            'alamat' => $alamat,
            'produk' => $produk,
            'total_produk' => $total_produk,
            'total_harga' => $total_harga
        ]);

        $session->remove('cart');

        $session->setFlashdata('successOrder', true);
        return redirect()->to("/pesanan");
    }

    public function uploadBukti()
    {
        $session = session();
        $id_order = $this->request->getPost('id_order');
        $metode_pembayaran = $this->request->getPost('metode_pembayaran');

        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (in_array($file->getMimeType(), $allowedTypes)) {
                $newName = $file->getRandomName();
                $file->move('image/upload/buktiPembayaran/', $newName);
            } else {
                $session->setFlashdata('alertuploads', true);
                $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                Format file tidak didukung !
                </div>');
                return redirect()->to("/pesanan");
            }
        } else {
            $session->setFlashdata('alertuploads', true);
            $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                Terjadi kesalahan saat mengunggah file, harap ulangi lagi !
                </div>');
            return redirect()->to("/pesanan");
        }

        $tanggal_bayar = date('Y-m-d');

        $data = [
            'id_user_konsumen' => session()->get('id_konsumen'),
            'metode_pembayaran' => $metode_pembayaran,
            'tanggal_bayar' => $tanggal_bayar,
            'file_bukti' => $newName,
            'status' => 'Menunggu Konfirmasi'
        ];
        // $this->PayModel->save($data);
        $this->PayModel->where('id_order', $id_order)->set($data)->update();

        $session->setFlashdata('successTransfer', true);
        return redirect()->to("/pesanan");
    }

    public function editBukti()
    {
        $session = session();
        $id_order = $this->request->getPost('id_order');
        $metode_pembayaran = $this->request->getPost('metode_pembayaran');

        $order = $this->PayModel->find($id_order);

        $file = $this->request->getFile('file');
        $newName = null;
        if ($file->isValid() && !$file->hasMoved()) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (in_array($file->getMimeType(), $allowedTypes)) {
                // Hapus file lama jika ada
                if ($this->PayModel && !empty($order['file_bukti'])) {
                    $oldFile = 'image/upload/buktiPembayaran/' . $order['file_bukti'];
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }
                $newName = $file->getRandomName();
                $file->move('image/upload/buktiPembayaran/', $newName);
            } else {
                $session->setFlashdata('alertuploads', true);
                $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                Format file tidak didukung !
                </div>');
                return redirect()->to("/pesanan");
            }
        } else {
            $session->setFlashdata('alertuploads', true);
            $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                Terjadi kesalahan saat mengunggah file, harap ulangi lagi !
                </div>');
            return redirect()->to("/pesanan");
        }

        $tanggal_bayar = date('Y-m-d');

        $data = [
            'metode_pembayaran' => $metode_pembayaran,
            'tanggal_bayar' => $tanggal_bayar,
            'file_bukti' => $newName
        ];
        $this->PayModel->where('id_order', $id_order)->set($data)->update();

        $session->setFlashdata('alertuploads', true);
        $session->setFlashdata('msg', '
            <div class="alert alert-primary" role="alert">
            Bukti Pembayaran berhasil di edit !
            </div>');
        return redirect()->to("/pesanan");
    }

    public function download($id_order)
    {
        $session = session();
        $order = $this->PayModel->find($id_order);

        if (!$order) {
            $session->setFlashdata('alertuploads', true);
            $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                Order tidak ditemukan !
                </div>');
            return redirect()->to("/pesanan");
        }

        $filePath = 'image/upload/buktiPembayaran/' . $order['file_bukti'];
        if (file_exists($filePath)) {
            $newName = 'BuktiPembayaran_' . session()->get('fullname') . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
            return $this->response->download($filePath, null)
                ->setFileName($newName);
        } else {
            $session->setFlashdata('alertuploads', true);
            $session->setFlashdata('msg', '
                <div class="alert alert-danger" role="alert">
                File tidak ditemukan !
                </div>');
            return redirect()->to("/pesanan");
        }
    }

    public function cancel($id_order)
    {
        $session = session();
        $order = $this->PayModel->find($id_order);

        if (!$order) {
            return redirect()->back()->with('error', 'Order tidak ditemukan.');
        }

        $filePath = 'image/upload/buktiPembayaran/' . $order['file_bukti'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $this->PayModel->delete($id_order);

        $session->setFlashdata('alertuploads', true);
        $session->setFlashdata('msg', '
                <div class="alert alert-warning" role="alert">
                Pemesanan berhasil dicancel & dihapus !
                </div>');
        return redirect()->to("/pesanan");
    }

    public function delete($id_order)
    {
        $session = session();
        $order = $this->PayModel->find($id_order);

        if (!$order) {
            return redirect()->back()->with('error', 'Order tidak ditemukan.');
        }

        $filePath = 'image/upload/buktiPembayaran/' . $order['file_bukti'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $this->PayModel->delete($id_order);

        $session->setFlashdata('alertuploads', true);
        $session->setFlashdata('msg', '
                <div class="alert alert-primary" role="alert">
                History pemesanan berhasil dihapus !
                </div>');
        return redirect()->to("/pesanan");
    }
}
