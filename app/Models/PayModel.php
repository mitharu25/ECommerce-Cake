<?php

namespace App\Models;

use CodeIgniter\model;

class PayModel extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id_order';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_user_konsumen', 'tanggal', 'total_harga',
        'metode_pembayaran', 'tanggal_bayar', 'file_bukti',
        'status'
    ];

    public function getCartProduct()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        $productDetails = [];
        foreach ($cart as $item) {
            $nama = $item['nama'];
            $quantity = $item['quantity'];
            $harga = $item['harga'];
            $totalHarga = $harga * $quantity;

            $productDetails[] = "{$nama} - x{$quantity} - Rp " . number_format($harga, 0, ',', '.');
        }

        return implode("\n", $productDetails);
    }

    public function getOrdersByUserId($id_user_konsumen)
    {
        $builder = $this->db->table('pesan');
        $builder->select('*');
        $builder->join('detail_pesan', 'pesan.id_order = detail_pesan.id_order');
        $builder->where('pesan.id_user_konsumen', $id_user_konsumen);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getJoinedData()
    {
        $builder = $this->db->table('pesan');
        $builder->select('*');
        $builder->join('detail_pesan', 'pesan.id_order = detail_pesan.id_order');
        $query = $builder->get();
        return $query->getResult();
    }
}
