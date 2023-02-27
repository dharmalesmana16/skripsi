<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceModel;

class MaintenanceController extends Controller
{
    protected $maintenance;
    public function __construct()
    {
        $this->maintenance = new MaintenanceModel;
    }
    public function index()
    {
        $data = [
            "title" => "Maintenance Page",
            "maintenances" => $this->maintenance->getData(),
        ];
        return view("config.maintenances.index", $data);

    }
    // function new (Request $request) {
    //     if ($request->isMethod('get')) {

    //     }
    // }

}
