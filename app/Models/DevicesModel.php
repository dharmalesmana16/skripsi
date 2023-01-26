<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevicesModel extends Model
{
    use HasFactory;
    protected $table = 'devices';
    protected $timestamps = true;

    // protected $guarded = ["*"];
    protected $fillable = ['nama_device', 'brand_device',
        'ipaddress', 'macaddress', 'latitude', 'longitude', 'status', 'meta'];
    public function getData($meta = false)
    {
        if ($meta === false) {
            return $this::all();
        } else {
            return $this::where('meta', $meta)->first();
        }
    }
}