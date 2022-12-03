<?php

namespace App\Controllers;
use \CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Datalampu;
use App\Models\Datadevice;
use App\Models\Datasuhu;
use App\Models\Devicecontrol;
use App\Models\Dataenergy;
use App\Models\Datalight;
use PDO;

class Api extends ResourceController
{
    use ResponseTrait;
    protected $URL;
    protected $deviceModel;
    protected $deviceControl;
    protected $lampModel;
    protected $dataEnergy;
    protected $dataLight;
    public function __construct()
    {
        $this->URL = base_url();
        $this->deviceModel = new Datadevice();
        $this->deviceControl = new Devicecontrol();
        $this->lampModel = new Datalampu();
        $this->tempModel = new Datasuhu();
        $this->dataEnergy = new Dataenergy();
        $this->dataLight = new Datalight();
        
    }
    public function executeAction()
    {
        
    }
    public function getDevice($idDevce = false){
        if($idDevce === false){
            $data = $this->deviceModel->getData();
        }else{
            $data = $this->deviceModel->getData($idDevce);
        }
        if($data){
            return $this->respond($data,200);
        }else{
            return $this->failNotFound("Data Not Found",500);
        }        
    }
    public function getLamp($idLamp = false){
        if($idLamp === false){
            $data = $this->lampModel->getData();
        }else{
            $data = $this->lampModel->getData($idLamp);
        }
        if($data){
            return $this->respond($data,200);
         }else{
            return $this->failNotFound("Data Not Found",500);
         }
    }
    public function getDataEnergy($idLamp = false){
        // Display : Current , KWH , Power and Voltage
        if($idLamp === false){
            $data = $this->dataEnergy->getDataEnergy();
        }else{
            $data = $this->dataEnergy->getDataEnergy($idLamp);
        }
        if($data){
            return $this->respond($data,200);
         }else{
            return $this->failNotFound("Data Not Found",500);
         }
    }
    public function getDatalight($idLamp = false){
        // Display : Current , KWH , Power and Voltage
        if($idLamp === false){
            $data = $this->dataLight->getDataLight();
        }else{
            $data = $this->dataLight->getDataLight($idLamp);
        }
        if($data){
            return $this->respond($data,200);
         }else{
            return $this->failNotFound("Data Not Found",500);
         }
    }
    public function getDataTempDevice($idDevice = false){
        
        if($idDevice === false){
            $data = $this->tempModel->getData();
        }else {
            $data = $this->tempModel->getData($idDevice);
        }
        if($data){
           return $this->respond($data,200);
        }else{
           return $this->failNotFound("Data Not Found",500);
        }
    }
  
  
    public function lampControl($timer = false){
        // $mode = $this->request->getVar("mode");
        // $PORT = $this->request->getVar("port");
        // $id = $this->request->getVar("id");
        // $state = $this->request->getVar("state");
        // if($mode == ""){
        //     $mode = "MANUAL";
        // }elseif($mode == "AUTO"){
        //     $jamMulai = $this->request->getVar("started_at");
        //     $jamAkhir = $this->request->getVar("ended_at");
        // }else{
        //     $msg = [
        //         "msg" => "Mode must be given (AUTO/MANUAL) !"
        //     ];
            
        //     return $this->respondCreated($msg);
        // }
        // if($state != "ON" || $state != "OFF"){
        //     $msg = [
        //         "msg" => "state must be given (ON/OFF) !"
        //     ];
            
        //     return $this->respondCreated($msg);
        // }
        // if($id == ""){
        //     $msg = [
        //         "msg" => "Id must be given (get detail from data Control first) !"
        //     ];
            
        //     return $this->respondCreated($msg);
        // }

        // $data = [
        //     "id" => $id,
        //     "state" => $this->request->getVar("state"),
        //     "mode" => $mode,
        //     "started_at"=> $jamMulai,
        //     "ended_at"=> $jamAkhir,
        
        // ];
        // $this->deviceControl->save($data);
        // if($data){
        //     $msg = [
        //         "msg"=>"Sukses"
        //     ];      
        //     return $this->respondCreated($data);
        //   }
    }

}
