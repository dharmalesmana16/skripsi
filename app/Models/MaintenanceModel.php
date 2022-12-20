<?php

namespace App\Models;

use CodeIgniter\Model;

class MaintenanceModel extends Model
{
    protected $table          = 'datamaintenance';
    protected $allowedFields    = ['action','jenis_kerusakan','jenis_penanganan','id_user','created_at','updated_at'];

    protected $useTimestamps = true;
    public function getData($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id' => $id])->first();
        }
    }
}
