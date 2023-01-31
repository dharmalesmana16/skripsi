<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MonitoringLampsController extends Controller
{
    public function index($nama_lampu = null)
    {
        $res = DB::table('lamps')->where('nama_lampu', $nama_lampu)->first();

        $data = [
            "title" => "Monitoring " . $res->nama_lampu,
            // "lamps" => $resp,
        ];

        if ($res) {
            return view('monitorings.lamps.index', $data);
        } else {
            echo "error";
        }
    }
}