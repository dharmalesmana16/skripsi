<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\LogModel;
class Auth extends BaseController
{
    protected $userModel;
    protected $logModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->logModel = new LogModel();
    }
    public function login()
    {
        
        return view('auth/index');
    }

    public function authlogin(){
     $username = $this->request->getVar('username');
     $password = $this->request->getVar('password');
     $passcrypt =password_hash($password,PASSWORD_BCRYPT);
     $auth = $this->userModel->where(['username' => $username])->first();
    
     if($auth){
      $pass=$auth['password'];
      $status = $auth['status'];
       if(password_verify($password, $pass)){
        if($status == "PENDING"){
            session()->setFlashdata('pending',"Your account is not active, please contact your admin !");
           
            return redirect()->to(base_url('/login'));
        }else{

            session()->set([
             'username'=>$auth['username'],
             'logged_in'=>true,
             'role'=>$auth['role'],
             'nama' => $auth['nama_depan']." ".$auth['nama_belakang']
             ]);
     
            
            return redirect()->to(base_url('/'));
        }

      }
        
          else{
       session()->setFlashdata('error',"Password Anda Salah !");
       return redirect()->back()->WithInput();
      }
     }else{
      session()->setFlashdata('error',"Username tidak terdaftar !");
      return redirect()->back()->WithInput();
     }
    }

    public function register(){
     
      return view('/auth/register');
    }
    public function authregister(){
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
      'password' => [
          'rules' => 'required|min_length[4]|max_length[50]',
          'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 4 Karakter',
              'max_length' => '{field} Maksimal 50 Karakter',
          ]
      ],
      'konfirmasi_password' => [
          'rules' => 'matches[password]',
          'errors' => [
              'matches' => 'Konfirmasi Password tidak sesuai dengan password',
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
     $this->userModel->save([
      'username' => $this->request->getPost('username'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
      'nama_depan' => $this->request->getPost('nama_depan'),
      'nama_belakang' => $this->request->getPost('nama_belakang'),
      'email' => $this->request->getPost('email'),
      'nohp' => $this->request->getPost('nohp'),
      'role' => $this->request->getPost('role'),
      'foto' => $this->request->getPost('foto'),
   ]);
  return redirect()->to('/login');

    }
    public function logout(){
    //  $this->cache->clean();
     $data = [
         'action' => session()->get('username')." Logout"
         
       ];
       $this->logModel->insert($data);    
       session()->destroy();
       return redirect()->to(base_url('/signin'));
    }
}
