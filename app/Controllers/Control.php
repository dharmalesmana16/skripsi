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
    public function getIndex()
    {
        $data = [
            "dataControl" =>$this->datacontrol->getData(),
            // "data" =>$this->datacontrol->getControl(),
            "title" => "Page Control"
        ];
        return view('controlling/index',$data);
    }
   
}
