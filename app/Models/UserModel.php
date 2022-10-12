<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_depan','nama_belakang','username','password','nohp','email','role','status','craeted_at','updated_at'];

    // Dates
    protected $useTimestamps = true;
    public function getData($id = false ){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id' => $id])->first();
        }
    }
}
