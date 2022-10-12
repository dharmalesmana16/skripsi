<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
class User extends ResourceController
{
    protected $userModel;
	use ResponseTrait;
	public function __construct()
	{
		$this->userModel = new UserModel();
	}

	public function index(){
		$data = [
		  "dataUser" => $this->userModel->getData(),
		  "title" => "Data Users | NS2 Anemometer"
		 ];
		 return view("config/user/index",$data);
	   }
	   public function new(){
		$data = [
		  "title" => "Data Devices | NS2 Anemometer",
		  "pageheader" => "Create New Device",
		  "dataDevice" => $this->userModel->getData()
		 ];
		 return view("config/user/create",$data);
	   }
	   public function edit($id = null){
		$data = [
		 "title" => "Data User | NS2 Anemometer",
		 "pageheader" => "User",
		 "dataUser" => $this->userModel->getData($id)
		];
		return view("config/user/edit",$data);
	   }
	   public function create(){
        if(!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
        
            'nama_depan' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'nama_belakang' => [
             'rules' => 'required|min_length[4]|max_length[100]',
             'errors' => [
                 'required' => '{field} Harus diisi',
                 'min_length' => '{field} Minimal 4 Karakter',
                 'max_length' => '{field} Maksimal 100 Karakter',
             ]
         ],
         'nohp' => [
          'rules' => 'required|min_length[4]|decimal',
          'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 4 Karakter',
              'decimal' => '{field} Isi Dengan Angka !',
          ]
      ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            // return redirect()->back()->withInput();
        }
		$data = [
            'nama_depan' => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash('x0121oke', PASSWORD_BCRYPT),
            'email' => $this->request->getPost('email'),
            'nohp' => $this->request->getPost('nohp'),
            'role' => $this->request->getPost('role'),
            // '' => $this->request->getPost(''),
	   ];
	   $this->userModel->insert($data);
	   $response = [
		'status'   => 200,
		'error'    => null,
		'messages' => [
			'success' => 'Data produk berhasil ditambahkan.'
		]
	  ];
	   $result = $this->respondCreated($response);
	   return redirect()->to('/device');
	   }
	   public function show($id = null){
		$data = $this->userModel->where(['id' => $id])->first();
		if($data){
		  return $this->respond($data);
		}else{
		  return $this->failNotFound('Data Not Found !');
		}
	   }
	   public function update($id = null){
		$id = $this->request->getPost('id');
		$data = [
		  'id' => $this->request->getPost('id'),
		  'nama_depan' => $this->request->getPost('nama_depan'),
		  'nama_belakang' => $this->request->getPost('nama_belakang'),
		  'username' => $this->request->getPost('username'),
		  'email' => $this->request->getPost('email'),
		  'nohp' => $this->request->getPost('nohp'),
		  'role' => $this->request->getPost('role'),
		];
		$this->userModel->update($id,$data);
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
		 
		  $this->userModel->delete($id);  
		  $response = [
			'status'   => 200,
			'error'    => null,
			'messages' => [
				'success' => 'Data produk berhasil dihapus.'
			],
		];
		return $this->respondCreated($response);
		// return redirect()->to('/device');
		
	   }
}
