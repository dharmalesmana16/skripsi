<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datadevice;

class Report extends BaseController
{
    
    public function getIndex()
    {
        $dataDevice = new Datadevice();
        $data = [
            "title" => "Page Report",
            "datadevice" => $dataDevice->getData()
        ];
        return view('report/index',$data);
      }
}
