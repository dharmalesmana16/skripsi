<?php

namespace App\Controllers;
use App\Models\Datadevice;
class Home extends BaseController
{
    protected $datadevice;
    public function __construct()
    {
        $this->datadevice = new Datadevice();
    }
    public function index()
    {
        $db = \Config\Database::connect();
        $query= $db->query("SELECT  datadevice.nama_device,devicecontrol.datadevice_id,devicecontrol.datalampu_id ,
        datalampu.status,datalampu.brand, datalampu.type,datalampu.nama_lampu,devicecontrol.mode,
        devicecontrol.started_at,devicecontrol.ended_at FROM 
        ((devicecontrol INNER JOIN datalampu ON devicecontrol.datalampu_id = datalampu.id) INNER JOIN datadevice 
        ON devicecontrol.datadevice_id = datadevice.id)");   
        // $queryDevice = $db->query("SELECT datadevice.nama_device,datadevice.status,datasuhu.
        // temp,datasuhu.humi,datasuhu.device_id,datasuhu.id,day(datasuhu.created_at) FROM datasuhu INNER JOIN datadevice ON 
        // datasuhu.device_id = datadevice.id ORDER BY datasuhu.device_id DESC ");
        // $queryDevice = $db->query("SELECT datadevice.nama_device,datadevice.status,datasuhu.
        // temp,datasuhu.humi,datasuhu.device_id,datasuhu.id,day(datasuhu.created_at) FROM datasuhu INNER JOIN datadevice ON 
        // -- datasuhu.device_id = datadevice.id ORDER BY datasuhu.device_id DESC ");
        // FIX QUERY
        $queryDevice= $db->query("SELECT datasuhu.*,datadevice.* FROM datasuhu  INNER JOIN datadevice ON datasuhu.device_id = datadevice.id,(select id,device_id,
        max(created_at) as created_at from datasuhu group by device_id ) max_suhu 
        WHERE datasuhu.device_id = max_suhu.device_id and datasuhu.created_at 
        = max_suhu.created_at GROUP BY datasuhu.device_id");
        $dataLamp = $query->getResultArray();
        $dataDevice = $queryDevice->getResultArray();
        $data = [
            "title" => "Page Home",
            "datadevice" => $this->datadevice->getData(),
            "dataLamp" => $dataLamp,
            "dataDevice" => $dataDevice,
        ];
        return view('home/index',$data);
    }
}
