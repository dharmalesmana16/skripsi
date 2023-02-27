<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    public $timestamps = true;

    // protected $guarded = ["*"];
    protected $fillable = ['first_namee', 'last_name',
        'username', 'email', 'handphone', 'password', 'created_at', 'updated_at', 'status', 'ROLE', 'foto'];
    public function getData($id = false)
    {
        if ($id === false) {
            return $this::all();
        } else {
            return $this::where('id', $id)->first();
        }
    }
}
