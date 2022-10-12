<?php

namespace App\Models;

use CodeIgniter\Model;

class Datalampu extends Model
{
    protected $table            = 'datalampu';
    protected $allowedFields    = ['nama_lampu','brand','status','type','device_id','created_at','updated_at'];

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
