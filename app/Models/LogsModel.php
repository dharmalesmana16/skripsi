<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogsModel extends Model
{
    use HasFactory;
    protected $table = 'logs';
    public $timestamps = true;

    // protected $guarded = ["*"];
    protected $fillable = ['*'];
    public function getData($id = false)
    {
        if ($id === false) {
            return $this::all();
        } else {
            return $this::where('id', $id)->first();
        }
    }
}