<?php

namespace App\Models;

use CodeIgniter\model;

class MetodeTransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['metode', 'kode'];

    public function getMotodeT()
    {
        return $this->findAll();
    }
}
