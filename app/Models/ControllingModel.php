<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControllingModel extends Model
{
    use HasFactory;
    protected $table = 'controls';
    // protected $guarded = ["*"];
    protected $timestamps = true;

    protected $fillable = ['nama_state', 'mode',
        'started_at', 'ended_at', 'port', 'device_id', 'lamp_id', 'state'];
    // protected $timesta
    public function getData($id = false)
    {
        if ($id === false) {
            return $this::all();
        } else {
            return $this::where('id', $id)->first();
        }
    }
}