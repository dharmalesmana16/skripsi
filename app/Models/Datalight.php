<?php

namespace App\Models;

use CodeIgniter\Model;

class Datalight extends Model
{
    protected $table            = 'datalight';
 
    protected $allowedFields    = ['value','id_lamp','created_at','updated_at'];

    // Dates
    protected $useTimestamps = true;
  
    public function getDataLight($id = false){

        $db = \Config\Database::connect();
        if($id === false){

        $queryEnergy= $db->query("SELECT datalight.*,datalampu.* FROM datalight  INNER JOIN datalampu ON datalight.id_lamp = datalampu.id,(select id,id_lamp,
        max(created_at) as created_at from datalight group by id_lamp ) max_light 
        WHERE datalight.id_lamp = max_light.id_lamp and datalight.created_at 
        = max_light.created_at GROUP BY datalight.id_lamp");
       
        }else{
            $queryEnergy = $db->query("SELECT * FROM datalight WHERE id_lamp = $id ORDER BY id DESC LIMIT 1");
            // return $this->where(['id_lamp'=>$id])->findAll(1,2);
        }
        if($queryEnergy){

            $result = $queryEnergy->getResultArray();
            return $result;
        }
    }
}
