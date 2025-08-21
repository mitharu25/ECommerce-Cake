<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id_order';
    protected $allowedFields = ['id_user_konsumen', 'tanggal', 'total_harga', 'metode_pembayaran', 'tanggal_bayar', 'file_bukti', 'status'];

    public function getDailyOrders()
    {
        $builder = $this->db->table($this->table);
        $builder->select('tanggal, COUNT(id_order) as total_orders');
        $builder->groupBy('tanggal');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function countByStatus($status)
    {
        return $this->where('status', $status)->countAllResults();
    }

    public function JoinedDataPesan()
    {
        return $this->db->table('pesan')
            ->join('detail_pesan', 'detail_pesan.id_order = pesan.id_order AND detail_pesan.id_user_konsumen = pesan.id_user_konsumen')
            ->select('pesan.*, detail_pesan.nama, detail_pesan.phone, detail_pesan.alamat, detail_pesan.produk, detail_pesan.total_produk, detail_pesan.total_harga as detail_total_harga')
            ->get()
            ->getResultArray();
    }

    public function JoinedDataPesanById($id_order)
    {
        return $this->db->table('pesan')
            ->join('detail_pesan', 'detail_pesan.id_order = pesan.id_order AND detail_pesan.id_user_konsumen = pesan.id_user_konsumen')
            ->where('pesan.id_order', $id_order)
            ->select('pesan.*, detail_pesan.nama, detail_pesan.phone, detail_pesan.alamat, detail_pesan.produk, detail_pesan.total_produk, detail_pesan.total_harga as detail_total_harga')
            ->get()
            ->getRowArray();
    }

    public function getMenungguTransaksi()
    {
        return $this->db->table('pesan')
            ->join('detail_pesan', 'detail_pesan.id_order = pesan.id_order AND detail_pesan.id_user_konsumen = pesan.id_user_konsumen')
            ->select('pesan.*, detail_pesan.nama, detail_pesan.phone, detail_pesan.alamat, detail_pesan.produk, detail_pesan.total_produk, detail_pesan.total_harga as detail_total_harga')
            ->where('pesan.status', 'Menunggu Transaksi')
            ->get()
            ->getResultArray();
    }

    public function getMenungguKonfirmasi()
    {
        return $this->db->table('pesan')
            ->join('detail_pesan', 'detail_pesan.id_order = pesan.id_order AND detail_pesan.id_user_konsumen = pesan.id_user_konsumen')
            ->select('pesan.*, detail_pesan.nama, detail_pesan.phone, detail_pesan.alamat, detail_pesan.produk, detail_pesan.total_produk, detail_pesan.total_harga as detail_total_harga')
            ->where('pesan.status', 'Menunggu Konfirmasi')
            ->get()
            ->getResultArray();
    }

    public function getDikonfirm()
    {
        return $this->db->table('pesan')
            ->join('detail_pesan', 'detail_pesan.id_order = pesan.id_order AND detail_pesan.id_user_konsumen = pesan.id_user_konsumen')
            ->select('pesan.*, detail_pesan.nama, detail_pesan.phone, detail_pesan.alamat, detail_pesan.produk, detail_pesan.total_produk, detail_pesan.total_harga as detail_total_harga')
            ->where('pesan.status', 'Dikonfirmasi & Dikirim')
            ->get()
            ->getResultArray();
    }

    public function getArrived()
    {
        return $this->db->table('pesan')
            ->join('detail_pesan', 'detail_pesan.id_order = pesan.id_order AND detail_pesan.id_user_konsumen = pesan.id_user_konsumen')
            ->select('pesan.*, detail_pesan.nama, detail_pesan.phone, detail_pesan.alamat, detail_pesan.produk, detail_pesan.total_produk, detail_pesan.total_harga as detail_total_harga')
            ->where('pesan.status', 'Arrived')
            ->get()
            ->getResultArray();
    }

    public function getCancel()
    {
        return $this->db->table('pesan')
            ->join('detail_pesan', 'detail_pesan.id_order = pesan.id_order AND detail_pesan.id_user_konsumen = pesan.id_user_konsumen')
            ->select('pesan.*, detail_pesan.nama, detail_pesan.phone, detail_pesan.alamat, detail_pesan.produk, detail_pesan.total_produk, detail_pesan.total_harga as detail_total_harga')
            ->where('pesan.status', 'Dibatalkan')
            ->get()
            ->getResultArray();
    }
}
