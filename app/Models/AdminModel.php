<?php

namespace App\Models;

use CodeIgniter\model;

class AdminModel extends Model
{
    protected $table = 'user_admin';
    protected $primaryKey = 'id_admin';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'nik', 'jenkel', 'tgl_lahir', 'alamat', 'phone', 'email', 'username', 'password'];

    public function getAll()
    {
        return $this->findAll();
    }

    public function deleteKonsumen($id_admin)
    {
        return $this->delete($id_admin);
    }
}
