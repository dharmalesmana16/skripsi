<?php

namespace App\Controllers;
use \CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Datalampu;
use App\Models\Datadevice;
use App\Models\Datasuhu;
use App\Models\Devicecontrol;
class Api extends ResourceController
{
    use ResponseTrait;
    protected $URL;
    protected $deviceModel;
    protected $deviceControl;
    protected $lampModel;
    public function __construct()
    {
        $this->URL = base_url();
        $this->deviceModel = new Datadevice();
        $this->deviceControl = new Devicecontrol();
        $this->lampModel = new Datalampu();
        $this->tempModel = new Datasuhu();
        
    }
    public function executeAction()
    {
        
    }
    public function getDevice(){
        // $dataDevice = $this->deviceModel->getData();
        
    }
    public function getDeviceById($idDevice = false){
    
    }
   
    public function getLamp(){

    }
    public function getLampById($idLamp = false){

    }

    public function getDataEnergy($idDevice = false){

    }
    public function getDataTemp(){
        $data = $this->tempModel->getData();
        if($data){
           return $this->respond($data,200);
        }else{
           return $this->failNotFound("Data Not Found",500);
        }
    }
    public function getDataTempByDevice($idDevice = false){
        $data = $this->tempModel->getData($idDevice);
        if($data){
           return $this->respond($data,200);
        }else{
           return $this->failNotFound("Data Not Found",500);
        }
    }
    public function lampControlTimer($id = false){

    }


}
