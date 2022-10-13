<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Datadevice;
use CodeIgniter\API\ResponseTrait; 

class Device extends ResourceController
{
    use ResponseTrait;
    protected $deviceModel;
     public function __construct()
    {
     $this->deviceModel = new Datadevice();
    }
   
    public function index(){
     $data = [
       "dataDevice" => $this->deviceModel->getData(),
       "title" => "Data Devices | NS2 Anemometer"
      ];
      return view("config/device/index",$data);
    }
    public function new(){
     $data = [
       "title" => "Data Devices | NS2 Anemometer",
       "pageheader" => "Create New Device",
       "dataDevice" => $this->deviceModel->getData()
      ];
      return view("config/device/create",$data);
    }
    public function edit($id = null){
     $data = [
      "title" => "Data Devices | NS2 Anemometer",
      "pageheader" => "Create New Device",
      "dataDevice" => $this->deviceModel->getData($id)
     ];
     return view("config/device/edit",$data);
    }

    public function create(){
      if(!$this->validate([
        'device_name' => [
            'rules' => 'required|min_length[4]|max_length[20]|is_unique[datadevice.nama_device]',
            'errors' => [
                'required' => '{field} Harus diisi',
                'is_unique' => 'Nama Device sudah digunakan sebelumnya'
            ]
        ],
        'meta' => [
            'rules' => 'required|min_length[4]|max_length[20]|is_unique[datadevice.meta]',
            'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 20 Karakter',
                'is_unique' => 'nama meta sudah digunakan sebelumnya'
            ]
        ],
    
    ])) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();   
     }
      else{

      $data = [
       'nama' => $this->request->getPost('device_name'),
       'brand' => $this->request->getPost('device_brand'),
       'tipekoneksi' => $this->request->getPost('device_connectivity'),
       'latitude' => $this->request->getPost('latitude'),
       'longitude' => $this->request->getPost('longitude'),
       'status' => 'Active',
       'mac' => $this->request->getPost('mac'),
       'meta' => $this->request->getPost('meta'),
       'ipaddress' => $this->request->getPost('ip'),
       
     ];
     $this->deviceModel->insert($data);
     $response = [
      'status'   => 200,
      'error'    => null,
      'messages' => [
          'success' => 'Data device berhasil ditambahkan.'
      ]
     ];
     return $this->respondCreated($response);
    //  return redirect()->to('/device');
    }
    }
   
   
    public function show($id = null){
     $datadevice = $this->deviceModel->getData($id);
     $data = [
       "dataDevice" => $datadevice,
       "title" => "Data Devices | NS2 Anemometer"
      ];
       if($this->request->isAJAX()){
       $msg = [
         'data' => view('config/device/show',$data),
       ];
       echo json_encode($msg);
     }
    //  $response = [
    //    'devicename' => $datadevice['nama_device'],
    //    'devicebrand' => $datadevice['brand'],
    //    'deviceip' => $datadevice['ipaddress'],
    //    'deviceconnectivity' => $datadevice['tipekoneksi'],
    //    'deviceloc' => $datadevice['latitude'].",".$datadevice['longitude'],
    //  ];
    //  return $this->respondCreated($response);
    }
    public function update($id = null){
     $id = $this->request->getPost('id');
     $data = [
       'id' => $this->request->getPost('id'),
       'nama' => $this->request->getPost('device_name'),
       'brand' => $this->request->getPost('device_brand'),
       'tipekoneksi' => $this->request->getPost('device_connectivity'),
       'latitude' => $this->request->getPost('latitude'),
       'longitude' => $this->request->getPost('longitude'),
       'status' => 'Active',
       'mac' => $this->request->getPost('mac'),
       'ipaddress' => $this->request->getPost('ip'),
     ];
     $this->deviceModel->update($id,$data);
     $response = [
       'status'   => 200,
       'error'    => null,
       'messages' => [
           'success' => 'Data berhasil diubah.'
       ]
   ];
   $result = $this->respondCreated($response);
   return redirect()->to('/device');
   
   
    }
    public function delete($id = null){
      
       $this->deviceModel->delete($id);  
       if($id != null){
   
         $response = [
           'status'   => 200,
           'error'    => null,
           'messages' => [
               'success' => 'Data produk berhasil dihapus.'
           ],
       ];
       }else{
         $response = [
           'status'   => 500,
           'error'    => null,
           'messages' => [
               'success' => 'Data Produk Gagal Dihapus !'
           ],
       ];
       }
     // return redirect()->to('/device');
       return $this->respondCreated($response);
    }
   
}
