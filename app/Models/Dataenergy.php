<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataenergy extends Model
{
    protected $table            = 'dataenergy';
    protected $allowedFields    = ['id','kwh','volt','power','current','created_at','updated_at'];

    // Dates
    protected $useTimestamps = true;

    public function getData($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id'=>$id])->first();
        }
    }
}
