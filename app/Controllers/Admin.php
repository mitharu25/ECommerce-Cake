<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KonsumenModel;
use App\Models\PesanModel;
use App\Models\HomeModel;
use App\Models\PicturesModel;
use App\Models\MetodeTransaksiModel;
use App\Models\DetailPesanModel;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{
    use ResponseTrait;

    protected $AdminModel;
    protected $KonsumenModel;
    protected $PesanModel;
    protected $HomeModel;
    protected $PircturesModel;
    protected $MetodeTransaksiModel;
    protected $DetailPesanModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->KonsumenModel = new KonsumenModel();
        $this->PesanModel = new PesanModel();
        $this->HomeModel = new HomeModel();
        $this->PircturesModel = new PicturesModel();
        $this->MetodeTransaksiModel = new MetodeTransaksiModel();
        $this->DetailPesanModel = new DetailPesanModel();
    }

    public function Dashboard(): string
    {
        $dataPesanan = $this->PesanModel->JoinedDataPesan();

        $totalProdukPerBulan = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0,
            'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0,
        ];

        foreach ($dataPesanan as $pesanan) {
            $bulan = date('M', strtotime($pesanan['tanggal']));
            $totalProdukPerBulan[$bulan] += $pesanan['total_produk'];
        }

        $barChartData = [
            'labels' => array_keys($totalProdukPerBulan),
            'data' => array_values($totalProdukPerBulan),
        ];

        $totalHargaPerBulan = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0,
            'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0,
        ];

        foreach ($dataPesanan as $pesanan) {
            $bulan = date('M', strtotime($pesanan['tanggal']));
            $totalHargaPerBulan[$bulan] += $pesanan['total_harga'];
        }

        $lineChartDataHarga = [
            'labels' => array_keys($totalHargaPerBulan),
            'data' => array_values($totalHargaPerBulan),
        ];

        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'totalKonsumen' => $this->KonsumenModel->getTotalKonsumen(),
            'totalProduk' => $this->DetailPesanModel->getTotalProduk(),
            'totalHarga' => $this->DetailPesanModel->getTotalHarga(),
            'totalPesan' => $this->DetailPesanModel->getTotalPesan(),
            'Transaction' => $this->PesanModel->JoinedDataPesan(),
            'barChartData' => $barChartData,
            'lineChartDataHarga' => $lineChartDataHarga,
        ];

        return view('admin/dashboard', $data);
    }

    public function DataKue(): string
    {
        $kue_list = $this->PircturesModel->getKueData2();

        $kue_pict = array();
        foreach ($kue_list as $kue) {
            $id_kue = $kue['id_kue'];
            $kue_pict[$id_kue] = $this->PircturesModel->getKuePictures($id_kue);
        }

        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'kue_list' => $this->HomeModel->getKue(),
            'kue_pict' => $kue_pict,
            'pictures' => $this->PircturesModel->getKueData2()
        ];

        return view('admin/produkKue', $data);
    }

    public function MetodeTransaksi(): string
    {
        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'MTransaksi' => $this->MetodeTransaksiModel->getMotodeT()
        ];

        return view('admin/metodeTransaksi', $data);
    }

    public function orders(): string
    {
        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'orders' => $this->PesanModel->JoinedDataPesan()
        ];

        return view('admin/orders', $data);
    }

    public function StatusMT(): string
    {
        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'order' => $this->PesanModel->getMenungguTransaksi()
        ];

        return view('admin/statusMT', $data);
    }

    public function StatusMK(): string
    {
        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'order' => $this->PesanModel->getMenungguKonfirmasi()
        ];

        return view('admin/statusMK', $data);
    }

    public function StatusDD(): string
    {
        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'order' => $this->PesanModel->getDikonfirm()
        ];

        return view('admin/statusDD', $data);
    }

    public function StatusArrived(): string
    {
        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'order' => $this->PesanModel->getArrived()
        ];

        return view('admin/statusArrived', $data);
    }

    public function StatusCancel(): string
    {
        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'order' => $this->PesanModel->getCancel()
        ];

        return view('admin/statusCancel', $data);
    }

    public function Chart(): string
    {
        $data = [
            'menungguTransaksi' => $this->PesanModel->countByStatus('Menunggu Transaksi'),
            'menungguKonfirmasi' => $this->PesanModel->countByStatus('Menunggu Konfirmasi'),
            'dikonfirmasiDikirim' => $this->PesanModel->countByStatus('Dikonfirmasi & Dikirim'),
            'arrived' => $this->PesanModel->countByStatus('Arrived'),
            'cancelled' => $this->PesanModel->countByStatus('Dibatalkan'),
            'totalKonsumen' => $this->KonsumenModel->getTotalKonsumen(),
        ];

        return view('admin/chart', $data);
    }

    public function exportToExcel()
    {
        // Ambil data dari model PesanModel
        $dataPesan = $this->PesanModel->JoinedDataPesan();

        // Membuat Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Mengatur header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Alamat');
        $sheet->setCellValue('E1', 'Produk');
        $sheet->setCellValue('F1', 'Total Produk');
        $sheet->setCellValue('G1', 'Total Harga');

        $totalKeseluruhan = 0;
        $row = 2; // Mulai dari baris kedua

        foreach ($dataPesan as $index => $pesan) {
            // Gabungkan produk menjadi satu baris dengan pemisah ";"
            $produkFormatted = str_replace("\n", "; ", $pesan['produk']);

            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $pesan['tanggal']);
            $sheet->setCellValue('C' . $row, $pesan['nama']);
            $sheet->setCellValue('D' . $row, $pesan['alamat']);
            $sheet->setCellValue('E' . $row, $produkFormatted);
            $sheet->setCellValue('F' . $row, $pesan['total_produk']);
            $sheet->setCellValue('G' . $row, $pesan['total_harga']);

            $totalKeseluruhan += $pesan['total_harga'];
            $row++;
        }

        // Menambahkan total keseluruhan di bagian bawah
        $sheet->setCellValue('A' . $row, 'Total Keseluruhan');
        $sheet->mergeCells('A' . $row . ':F' . $row); // Menggabungkan sel dari A sampai F
        $sheet->setCellValue('G' . $row, $totalKeseluruhan);

        // Mengatur nama file dan pengaturan download
        $filename = 'Data_Penjualan_' . date('Ymd') . '.xlsx';

        // Membuat writer dan mengirim file ke output
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
