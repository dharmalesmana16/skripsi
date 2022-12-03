<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PDO;
use App\Models\Datalampu;
class Lamp extends BaseController
{
    protected $lampModel;
    public function __construct()
    {
        $this->lampModel = new Datalampu();
    }
    public function index()
    {
        $data = [
            "title" => "Data Lampu",
            "dataLamp" =>$this->lampModel->getData()
        ];
        return view("config/lamp/index",$data);
    }

    public function new(){

    $data = [
      "title" => "New Lamp",
      "pageheader" => "New Lamp",
    ];
    return view('config/lamp/create',$data);
    }
    public function create(){
      // if($this->request->isAJAX()){
        $data = [
          "nama_lampu" => $this->request->getVar("nama_lampu"),
          "brand" => $this->request->getVar("brand"),
          "type" => $this->request->getVar("type"),
          "meta" => $this->request->getVar("nama_lampu"),
        ];

        $this->lampModel->insert($data);
        // return redirect()->to('/lamp');
      // }
    }
    public function update(){

    }
    public function edit($id){
        $dataLamp = $this->lampModel->getData($id);
        $data = [
          "dataLamp" => $dataLamp,
         ];
          if($this->request->isAJAX()){
          $msg = [
            'data' => view('config/lamp/edit',$data),
          ];
          echo json_encode($msg);
        }
    }
    public function show($id){
     $dataLamp = $this->lampModel->getData($id);
     $data = [
       "dataLamp" => $dataLamp,
      ];
       if($this->request->isAJAX()){
       $msg = [
         'data' => view('config/lamp/show',$data),
       ];
       echo json_encode($msg);
     }
    }
}
