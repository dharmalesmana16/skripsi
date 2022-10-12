<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datalampu;
class Menumonitoring extends BaseController
{
    protected $Datalampu;
    public function __construct()
    {
        $this->Datalampu = new Datalampu();
    }
    # code...
    
    // public function index($datadevices)
    // {
    //  $data = $this->datadevice->where(['meta' => $datadevices])->first();
    //  foreach ($this->datadevice->getData() as $datadevicess) {
    //   $data = [
    //       'title' => $datadevicess['nama'] .'| NS2 Anemometer'
    //       // 'datadevice' => 'Home | NS2 Anemometer',
    //   ];
    //   return view('menudevice/'.$datadevicess['meta'],$data);
    //    if($data){
    //      return $this->respond($data);
    //    }else{
    //      return $this->failNotFound('Data Not Found !');
    //    }
    //     }
    //  }
    public function index($datalampu = null){
     $menulampu = $this->Datalampu->where(['meta' => $datalampu])->first();
     $data = ["title" => "Monitoring ".$menulampu["nama_lampu"]];
     if($menulampu){
         return view('monitoringmenus/'.$menulampu['meta'],$data);
     }else{
      echo "error";
     }
    }
}
