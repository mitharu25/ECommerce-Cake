<?php

namespace App\Controllers;

use App\Models\PesanModel;
use App\Models\PayModel;
use CodeIgniter\API\ResponseTrait;
use Mpdf\Mpdf;

class Pesan extends BaseController
{
    use ResponseTrait;

    protected $PesanModel;
    protected $PayModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->PesanModel = new PesanModel();
        $this->PayModel = new PayModel();
    }

    public function EditMT($id_order)
    {
        $session = session();
        $data = ['status' => 'Menunggu Transaksi'];

        $result = $this->PesanModel->update($id_order, $data);

        if ($result) {
            $session->setFlashdata('success', 'Status berhasil diperbarui menjadi Menunggu Transaksi!');
        } else {
            $session->setFlashdata('error', 'Status gagal diperbarui!');
        }
        return redirect()->back();
    }

    public function EditMK($id_order)
    {
        $session = session();
        $data = ['status' => 'Menunggu Konfirmasi'];

        $result = $this->PesanModel->update($id_order, $data);

        if ($result) {
            $session->setFlashdata('success', 'Status berhasil diperbarui menjadi Menunggu Konfirmasi !');
        } else {
            $session->setFlashdata('error', 'Status gagal diperbarui!');
        }
        return redirect()->back();
    }

    public function EditDD($id_order)
    {
        $session = session();
        $data = ['status' => 'Dikonfirmasi & Dikirim'];

        $result = $this->PesanModel->update($id_order, $data);

        if ($result) {
            $session->setFlashdata('success', 'Status berhasil diperbarui menjadi Dikonfirmasi & Dikirim !');
        } else {
            $session->setFlashdata('error', 'Status gagal diperbarui!');
        }
        return redirect()->back();
    }

    public function EditArrived($id_order)
    {
        $session = session();
        $data = ['status' => 'Arrived'];

        $result = $this->PesanModel->update($id_order, $data);

        if ($result) {
            $session->setFlashdata('success', 'Status berhasil diperbarui menjadi Arrived !');
        } else {
            $session->setFlashdata('error', 'Status gagal diperbarui!');
        }
        return redirect()->back();
    }

    public function EditCancel($id_order)
    {
        $session = session();
        $data = ['status' => 'Dibatalkan'];

        $result = $this->PesanModel->update($id_order, $data);

        if ($result) {
            $session->setFlashdata('success', 'Status berhasil diperbarui menjadi Dibatalkan !');
        } else {
            $session->setFlashdata('error', 'Status gagal diperbarui!');
        }
        return redirect()->back();
    }

    public function download($id_order)
    {
        $session = session();
        $order = $this->PayModel->find($id_order);

        if (!$order) {
            $session->setFlashdata('error', 'Order tidak ditemukan !');
            return redirect()->to('/admin/MK');
        }

        $filePath = 'image/upload/buktiPembayaran/' . $order['file_bukti'];
        if (file_exists($filePath)) {
            $newName = 'BuktiPembayaran' . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
            return $this->response->download($filePath, null)
                ->setFileName($newName);
        } else {
            $session->setFlashdata('error', 'Terdapat masalah !');
            return redirect()->to('/admin/MK');
        }
    }

    public function EditDelete($id_order)
    {
        $session = session();

        $pesan = $this->PesanModel->find($id_order);

        if ($pesan) {
            $result = $this->PesanModel->delete($id_order);

            if ($result) {
                if (!empty($pesan['file_bukti']) && file_exists('image/upload/buktiPembayaran/' . $pesan['file_bukti'])) {
                    unlink('image/upload/buktiPembayaran/' . $pesan['file_bukti']);
                }

                $session->setFlashdata('success', 'Data dan file pesanan berhasil dihapus!');
            } else {
                $session->setFlashdata('error', 'Data pesanan gagal dihapus!');
            }
        } else {
            $session->setFlashdata('error', 'Data pesanan tidak ditemukan!');
        }

        return redirect()->back();
    }

    public function downloadStrukPDF($id_order)
    {
        $data['struk'] = $this->PesanModel->JoinedDataPesanById($id_order);

        $mpdf = new Mpdf();

        $html = view('/payment/struk_pdf', $data);

        $mpdf->WriteHTML($html);

        $mpdf->Output('struk_pesanan_' . $id_order . '.pdf', 'D');

        exit();
    }
}
