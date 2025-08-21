<?php

namespace App\Models;

use CodeIgniter\model;

class KueModel extends Model
{
    protected $table = 'kue';
    protected $primaryKey = 'id_kue';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug', 'jenis', 'kategori', 'deskripsi', 'harga', 'berat', 'gambar'];
}
