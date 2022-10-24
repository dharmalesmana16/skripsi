<?php

namespace App\Controllers;
use \CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Datalampu;
use App\Models\Datadevice;
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
    public function getTemp(){
        
    }
    public function getTempByDevice($idDevice = false){

    }


}
