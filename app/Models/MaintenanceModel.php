<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceModel extends Model
{
    use HasFactory;
    protected $table = 'lamps';
    public $timestamps = true;

    // protected $guarded = ["*"];
    protected $fillable = ['jenis_pebaikan', 'action',
        'updated_at', 'created_at', 'biaya_keluar', 'users', 'komponen'];
    public function getData($id = false)
    {
        if ($id === false) {
            return $this::all();
        } else {
            return $this::where('id', $id)->first();
        }
    }
}
