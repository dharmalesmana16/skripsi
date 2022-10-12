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
        $dataLamp = $query->getResultArray();
        $data = [
            "title" => "Page Home",
            "datadevice" => $this->datadevice->getData(),
            "dataLamp" => $dataLamp,
        ];
        return view('home/index',$data);
    }
}
