<?php

namespace App\Http\Controllers;

use App\Models\LogsModel;

class LogsController extends Controller
{
    public function index()
    {
        $logs = new LogsModel;
        $data = [
            "title" => "System Log Page",
            "logs" => $logs->getData(),
        ];
        return view("logs.index", $data);
    }
    public function show($id)
    {

    }

    public function delete($id)
    {

    }
}