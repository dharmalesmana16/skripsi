<?php

namespace App\Models;

use CodeIgniter\Model;

class Datadevice extends Model
{
    protected $table            = 'datadevice';
    protected $allowedFields    = ['nama_device','brand','tipekoneksi',
    'status','longitude','latitude','ipaddress','mac','meta','gambar',
    'created_at','updated_at'];

    // Dates
    protected $useTimestamps = true;
    public function getData($id = false ){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id' => $id])->first();
        }
    }
    // public function getControl($id = false){
    //     if($id === false){
    //         return $this->findAll();

    //     }else{

    //         $db = \Config\Database::connect();
    //         $querydata = $db->query("SELECT nama_device FROM datadevice");
    //         $query = $db->query("SELECT datadevice.id as deviceid,datadevice.nama_device,devicecontrol.mode as mode,devicecontrol.state,devicecontrol.nama_state,devicecontrol.id as datadevice_id
    //         FROM devicecontrol INNER JOIN datadevice ON devicecontrol.datadevice_id = datadevice.id WHERE deviceid = $id");
    
            
    //         $result = $query->getResultArray();
    //         return $result; 
    //     }
    // }
}
