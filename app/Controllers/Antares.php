<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Devicecontrol;
class Antares extends ResourceController
{
    protected $ACCESSKEY;
    protected $DEVICECONTROL;
    protected $URL;
    protected $URLS;
    protected $PORT;
    protected $APPNAME;
    protected $DEVICENAME;
    protected $client;
    protected $HEADER;
    // use CodeIgniter\HTTP\IncomingRequest;
    // {{protocol}}://{{IPorDomain}}:{{port}}/~/{{cse-id}}/{{cse-name}}/{{application-name}}/{{device-name}}/la
    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
        $this->DEVICECONTROL = new Devicecontrol();
        $this->ACCESSKEY = getenv('antares.ACCESSKEY');
        $this->PORT = 8443;
        $this->APPNAME = getenv('antares.ACCESSKEY');
        $this->DEVICENAME = getenv('antares.DEVICENAME');
        $this->URL = getenv('antares.URL').$this->PORT."/~/antares-cse/antares-id/".$this->APPNAME."/".$this->DEVICENAME;
        $this->URLS =getenv('antares.URL').$this->PORT."/~/antares-cse/antares-id/".$this->APPNAME."/";
    }
    public function getall(){
        $dataSource  = [
            "id" =>$this->request->getJsonVar('id'),
            "mode" =>$this->request->getJsonVar('mode'),
            "state" =>$this->request->getJsonVar('state'),
            "port" =>$this->request->getJsonVar('port'),
        ];  
        // $dataport = $this->request
        // $dataSource = $this->request->getJSON();
        return $this->response->setJSON($dataSource);
    }
    public function getData()
    {
        $headers = [
			'X-M2M-Origin' => $this->ACCESSKEY,
			'Content-Type' => 'application/json'
		];
		
		$response = $this->client->request('GET',$this->URL."/la",['headers' => $headers,'user_agent' => 'Mozilla/5.0']);
    return $response;
    }
    public function getDataByDevice($devicename = null)
    {
  
      if($devicename == null){
          $msg = [
            "Status Code" => 500,
            "Message" =>[
              "error" => "Set your Device Name !"
            ],
          ];
         return $this->respondCreated($msg);
        }else{
          $headers = [
          'X-M2M-Origin' => $this->ACCESSKEY,
          'Content-Type' => 'application/json'
        ];
        
        $response = $this->client->request('GET',$this->URLS.$devicename."/la",['headers' => $headers,'user_agent' => 'Chrome/5.0']);
            return $response;
        }
      
    }
    // Only POST method copied from Antares PHP Library;
    public function executeaction($resourceType = 4){
        $port = $this->request->getJsonVar('port');
        $state = $this->request->getJsonVar('state');
        $mode = $this->request->getVar('mode');
        $started_at = $this->request->getVar('started_at');
        $ended_at = $this->request->getVar('ended_at');
        if($mode == "auto"){
          $data = '{
            "m2m:cin": {
              "con": "{\"mode\":auto, \"started_at\":'.$started_at.', \"ended_at\":'.$ended_at.'}"
            }
          }';
        }else{
          $data = '{
              "m2m:cin": {
                "con": "{\"mode\":manual, \"state\":'.$state.', \"port\":'.$port.'}"
              }
            }';
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $tyParam = '';
        if ($resourceType) {
          $tyParam = ';ty=' . $resourceType;
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json'.$tyParam,
          'X-M2M-Origin: ' . $this->ACCESSKEY,
          'Accept: application/json',
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($responseCode >= 200 && $responseCode < 300) {
        $dataSource  = [
            "id" =>$this->request->getJsonVar('id'),
            "mode" =>$this->request->getJsonVar('mode'),
            "state" =>$this->request->getJsonVar('state'),
        ];
        $this->DEVICECONTROL->save($dataSource);
        $msg = [
          "status" => 200,
          "message" => "Success" 
      
      ];
      return $this->response->setJSON($msg);
        } else {
            $msg = [
                "status" => 500,
                "message" => "Internal Server Error" 
            
            ];
          return $this->response->setJSON($msg);
        }
       
     }
}
