<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Devicecontrol;
class Control extends BaseController
{
    protected $datacontrol;
    public function __construct()
    {
        $this->datacontrol = new Devicecontrol();
    }
    public function index()
    {
        $data = [
            "dataControl" =>$this->datacontrol->getData(),
            // "data" =>$this->datacontrol->getControl(),
            "title" => "Controlling | Smart PJU"
        ];
        return view('controlling/index',$data);
    }
    public function editSetting($id){
        $data = [
         'title' => "Config Device Mode",
         'header' => "",
         'dataDevice' => $this->datacontrol->getData($id)
         // 'brosurnuansa' => $this->brosur->getBrosurAll()
       ];
       return view('controlling/setting/index',$data);
    }
    public function updateSetting($id){
        $data = [
           "id" => $id,
           "mode" =>$this->request->getPost("mode"),
           "started_at" => $this->request->getPost("jam_mulai"),
           "ended_at" => $this->request->getPost("jam_akhir")
        ];
        $this->datacontrol->save($data);
        return redirect()->to(base_url('/control'));
    }
   
}
