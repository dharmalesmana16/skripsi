<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LampsModel extends Model
{
    use HasFactory;
    protected $table = 'lamps';
    public $timestamps = true;

    // protected $guarded = ["*"];
    protected $fillable = ['nama_lampu', 'brand_lampu',
        'updated_at', 'created_at', 'type', 'status', 'meta'];
    public function getData($meta = false)
    {
        if ($meta === false) {
            return $this::all();
        } else {
            return $this::where('meta', $meta)->first();
        }
    }
}
