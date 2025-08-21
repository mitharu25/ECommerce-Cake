<?php

namespace App\Models;

use CodeIgniter\model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'metode', 'kode'
    ];

    public function getTransaksi()
    {
        return $this->findAll();
    }
}
