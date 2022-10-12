<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogModel;
class Log extends BaseController
{
    public function getIndex()
    {
        $datalog = new LogModel();
        $data = [
            'title'=>"Page Log",
            'datalog'=>$datalog->getData()
        ];
        return view("log/index",$data);
    }
}
