<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataenergy extends Model
{
    protected $table            = 'dataenergy';
    protected $allowedFields    = ['id','kwh','volt','power','current','id_lamp','created_at','updated_at'];

    // Dates
    protected $useTimestamps = true;

    public function getData($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id'=>$id])->first();
        }
    }
    public function getDataEnergy($id = false){

        $db = \Config\Database::connect();
        if($id === false){

            $queryEnergy= $db->query("SELECT dataenergy.*,datalampu.* FROM dataenergy  INNER JOIN datalampu ON dataenergy.id_lamp = datalampu.id,(select id,id_lamp,
        max(created_at) as created_at from dataenergy group by id_lamp ) max_energy 
        WHERE dataenergy.id_lamp = max_energy.id_lamp and dataenergy.created_at 
        = max_energy.created_at GROUP BY dataenergy.id_lamp");
       
        }else{
            $queryEnergy = $db->query("SELECT * FROM dataenergy WHERE id_lamp = $id ORDER BY id DESC LIMIT 1");
            // return $this->where(['id_lamp'=>$id])->findAll(1,2);

        }
        if($queryEnergy){

            $result = $queryEnergy->getResultArray();
            return $result;
        }
    }

}
