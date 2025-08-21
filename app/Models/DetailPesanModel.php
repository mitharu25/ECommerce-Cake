<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPesanModel extends Model
{
    protected $table      = 'detail_pesan';
    protected $primaryKey = 'id_detail';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_order', 'id_user_konsumen', 'nama', 'phone', 'alamat', 'produk', 'total_produk', 'total_harga'
    ];

    public function getTotalProduk()
    {
        $query = $this->db->query("SELECT SUM(total_produk) AS total_produk FROM detail_pesan");
        return $query->getRow()->total_produk;
    }

    public function getTotalHarga()
    {
        $query = $this->db->query("SELECT SUM(total_harga) AS total_harga FROM detail_pesan");
        return $query->getRow()->total_harga;
    }

    public function getTotalPesan()
    {
        return $this->countAllResults();
    }
}
