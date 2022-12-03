<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Devicecontrol;
use App\Models\Datadevice;
use App\Models\Datalampu;
class Datacontrol extends BaseController
{
    protected $dataControl;
    protected $dataDevice;
    protected $dataLamp;
    public function __construct()
    {
        $this->dataControl = new Devicecontrol;
        $this->dataDevice = new Datadevice();
        $this->dataLamp = new Datalampu();
    }
    public function new()
    {
        $data = [
            "title" => 'Create New Control',
            "dataDevice" => $this->dataDevice->getData(),
            "dataLamp" => $this->dataLamp->getData(),
            "dataControl" => $this->dataControl->getData()
        ];
        return view('config/control/new', $data);
    }
    public function create(){
        $data = [
            'nama_state' => $this->request->getVar('nama_state'),
            'mode' => "MANUAL",
            'state' => "OFF",
            'port' => $this->request->getVar('port'),
            'datadevice_id' => $this->request->getVar('id_device'),
            'datalampu_id' => $this->request->getVar('id_lamp'),

        ];
        $this->deviceControl->insert($data);
        return redirect()->to('/control');
    }
}
