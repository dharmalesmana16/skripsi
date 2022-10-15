<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datadevice;
class Menudevice extends BaseController
{
    protected $datadevice;
    protected $OS;
    public function __construct()
    {
        $this->datadevice = new Datadevice();
        $this->OS = "";
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
    public function index($datadevice = null){
    
        function ping_ip($host){
            // $method = "";
            // if($this->OS == "WINDOWS"){
            //     $method = "n";
            // }else{

            // }
            $os = strtoupper(substr(PHP_OS, 0, 3));

            $cmd = sprintf('ping -w %d -%s %d %s',
            10,
            $os === 'WIN' ? 'n' : 'c',
            2,
            escapeshellarg($host)
            );
            $str = exec($cmd, $input, $result);
            // $array = explode("/", end(explode("=", $str )) );
            if ($result === 0){
                return '<span class="text-success"> Active </span><br>';
                
            }else{
                return '<span class="text-danger"> Not Active </span><br>';
            }
        }
        function ping($host){
        $PING_REGEX_TIME = '/time(=|<)(.*)ms/';
        $PING_TIMEOUT = 10;
        $PING_COUNT = 2;
        
        $os = strtoupper(substr(PHP_OS, 0, 3));
        
        // prepare command
        $cmd = sprintf('ping -w %d -%s %d %s',
            $PING_TIMEOUT,
            $os === 'WIN' ? 'n' : 'c',
            $PING_COUNT,
            escapeshellarg($host)
        );
        
        exec($cmd, $output, $result);
              
        
        $pingResults = preg_grep($PING_REGEX_TIME, $output); // discard output lines we don't need
        $pingResult = array_shift($pingResults); // we wanted just one ping anyway
        
        if (!empty($pingResult)) {
            preg_match($PING_REGEX_TIME, $pingResult, $matches); // we get what we want here
                $ping = floatval(trim($matches[2])); // here's our time
                return $ping ." ms";
        } else {
            return '<span class="text-danger"> - </span><br>';
        }
        }

    $menudevice = $this->datadevice->where(['meta' => $datadevice])->first();
    $idDevice = $menudevice['id'];
    $ipDevice = $menudevice['ipaddress'];
    $macDevice = $menudevice['mac'];
    $db = \Config\Database::connect();
    $query= $db->query("SELECT  devicecontrol.datadevice_id,devicecontrol.datalampu_id ,
    datalampu.status,datalampu.brand, datalampu.type,datalampu.nama_lampu,devicecontrol.mode,
    devicecontrol.started_at,devicecontrol.ended_at FROM 
    ((devicecontrol INNER JOIN datalampu ON devicecontrol.datalampu_id = datalampu.id) INNER JOIN datadevice 
    ON devicecontrol.datadevice_id = datadevice.id) WHERE devicecontrol.datadevice_id = $idDevice");
    $dataControlled  = $query->getResultArray();
    $controlledLamp = $query->getNumRows();
    $data = [
    "title" => $menudevice["nama_device"],
    "dataLamp" => $dataControlled,
    "macDevice" => $macDevice,
    "ipDevice" => $ipDevice,
    "statusDevice" => ping_ip($ipDevice),
    "packetTime" => ping($ipDevice),
    "controlledLamp"=>$controlledLamp,
    
    ];
     if($menudevice){
         return view('devicemenus/'.$menudevice['meta'],$data);
     }else{
      echo "error";
     }
    }
}
