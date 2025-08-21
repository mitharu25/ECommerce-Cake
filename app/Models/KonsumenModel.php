<?php

namespace App\Models;

use CodeIgniter\model;

class KonsumenModel extends Model
{
    protected $table = 'user_konsumen';
    protected $primaryKey = 'id_konsumen';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_konsumen', 'fullname', 'phone', 'email', 'alamat', 'username', 'password'];

    public function getAll()
    {
        return $this->findAll();
    }

    public function deleteKonsumen($id_konsumen)
    {
        return $this->delete($id_konsumen);
    }

    public function getTotalKonsumen()
    {
        return $this->countAllResults();
    }
}
