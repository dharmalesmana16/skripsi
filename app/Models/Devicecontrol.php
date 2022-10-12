<?php

namespace App\Models;

use CodeIgniter\Model;

class Devicecontrol extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'devicecontrol';
    protected $allowedFields    = ['nama_state','mode','state','started_at','ended_at','created_at','updated_at'];

    // Dates
    protected $useTimestamps = true;

    public function getData($id = false ){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id' => $id])->first();
        }
    }
    // public function getData(){
    //     $db = \Config\Database::connect();
    //     $query = $db->query("SELECT id,datadevice.nama_device,devicecontrol.nama_state FROM devicecontrol ");
    //     $result = $query->getResultArray();  
        
    // }
}
