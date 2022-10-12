<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table            = 'log';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['action','created_at','updated_at'];

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
