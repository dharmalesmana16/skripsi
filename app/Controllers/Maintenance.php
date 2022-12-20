<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MaintenanceModel;
class Maintenance extends BaseController
{
    protected $maintenanceModel;
    public function __construct()
    {
        $this->maintenanceModel = new MaintenanceModel();
    }
    
    public function index()
    {
        $data = [
            "title" => "Maintenance",
            "dataMaintenance" => $this->maintenanceModel->getData()
        ];
        return view("maintenance/index", $data);
    }
    
    public function show($id = null)
    {
        $data = [
            "title"=>"Maintenance"
        ];
        $msg = [
            "data" => view("maintenance/show",$data)
        ];
        echo json_encode($msg);
    }
    
    public function new()
    {

        }
    
    public function create()
    {
        $data =  [
            "action" => $this->request->getVar('action'),
            "jenis_kerusakan" => $this->request->getVar('jenis_kerusakan'),
            "jenis_penanganan" => $this->request->getVar('jenis_penanganan'),
            "id_user" => $this->request->getVar('id_user'),
        ];

    }
    
    public function edit($id = null)
    {
    }
    
    public function update($id = null)
    {
    }
    
    public function delete($id = null)
    {
    }
}
