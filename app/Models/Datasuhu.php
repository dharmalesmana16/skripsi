<?php

namespace App\Models;

use CodeIgniter\Model;

class Datasuhu extends Model
{
    protected $table            = 'datasuhu';
    protected $allowedFields    = ['temp','humi','created_at','updated_at'];

    // Dates
    protected $useTimestamps = true;

    public function getData($id = false ){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id' => $id])->first();
        }
    }
}
