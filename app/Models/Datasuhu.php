<?php

namespace App\Models;

use CodeIgniter\Model;

class Datasuhu extends Model
{
    protected $table            = 'datasuhu';
    protected $allowedFields    = ['temp','humi','created_at','updated_at'];

    // Dates
    protected $useTimestamps = true;

    public function getData($id = false){
        $db = \Config\Database::connect();
        if($id === false){
            return $this->findAll();
        }else{
        $query = $db->query("SELECT * FROM datasuhu 
        where device_id = $id ORDER BY id DESC LIMIT 1");
        return $query->getResultArray();
        }
    }
}
