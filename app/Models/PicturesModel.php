<?php

namespace App\Models;

use CodeIgniter\model;

class PicturesModel extends Model
{
    protected $table = 'pictures';
    protected $primaryKey = 'id_pict';
    protected $allowedFields = ['id_pict', 'id_kue', 'file'];

    public function getKueData2()
    {
        return $this->findAll();
    }

    public function getKuePictures($id_kue)
    {
        return $this->where('id_kue', $id_kue)->findAll();
    }

    public function deleteKue($id_kue)
    {
        $pictures = $this->db->table('pictures')->where('id_kue', $id_kue)->get()->getResultArray();

        $fileDeletionSuccess = true;
        foreach ($pictures as $picture) {
            $filePath = FCPATH . 'image/upload/pictures/' . $picture['file'];
            if (file_exists($filePath)) {
                if (!unlink($filePath)) {
                    $fileDeletionSuccess = false;
                }
            }
        }

        $deleteKueSuccess = $this->db->table('kue')->where('id_kue', $id_kue)->delete();

        return $fileDeletionSuccess && $deleteKueSuccess;
    }
}
