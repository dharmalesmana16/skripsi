<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogModel;
class Log extends BaseController
{
    public function index()
    {
        $datalog = new LogModel();
        $data = [
            'title'=>"System Log | Smart PJU",
            'datalog'=>$datalog->getData()
        ];
        return view("/log/index",$data);
    }
}
