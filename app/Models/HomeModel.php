<?php

namespace App\Models;

use CodeIgniter\model;

class HomeModel extends Model
{
    protected $table = 'kue';
    protected $primaryKey = 'id_kue';
    protected $useTimestamps = true;

    public function getKue($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getKueKering()
    {
        return $this->where('jenis', 'Kering')->findAll();
    }

    public function getKueKeringReguler()
    {
        return $this->where('kategori', 'Reguler')->findAll();
    }

    public function getKueKeringJAR()
    {
        return $this->where('kategori', 'JAR')->findAll();
    }

    public function getKueKeringKotak()
    {
        return $this->where('kategori', 'Kotak')->findAll();
    }

    public function getKueBasah()
    {
        return $this->where('jenis', 'Basah')->findAll();
    }

    public function getKueBasahReguler()
    {
        return $this->where('kategori', 'BoxPlastik')->findAll();
    }

    public function getKueBasahMini()
    {
        return $this->where('kategori', 'Mini')->findAll();
    }

    public function getKueWithPictures($id_kue)
    {
        return $this->select('kue.*, pictures.file')
            ->join('pictures', 'pictures.id_kue = kue.id_kue', 'left')
            ->where('kue.id_kue', $id_kue)
            ->findAll();
    }

    public function getKueData()
    {
        return $this->db->table('kue')
            ->select('kue.*, pictures.file')
            ->join('pictures', 'kue.id_kue = pictures.id_kue', 'left')
            ->get()
            ->getResultArray();
    }
}
