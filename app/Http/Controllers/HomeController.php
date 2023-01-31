<?php

namespace App\Http\Controllers;

use App\Models\DevicesModel;
use App\Models\UsersModel;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // $db = DB::table('controls')
    // ->join('devices', 'controls.device_id', '=', 'devices.id')
    // ->join('lamps', 'controls.lamp_id', '=', 'lamps.id')
    // ->select("controls.*", "devices.nama_device", "devices.id", "lamps.nama_lampu", "lamps.id")
    // ->get()->toArray();
    public function index()
    {
        $resp = DB::table('controls')
            ->join('devices', 'controls.device_id', '=', 'devices.id')
            ->join('lamps', 'controls.lamp_id', '=', 'lamps.id')
            ->select('lamps.nama_lampu', 'lamps.status', 'devices.nama_device', 'controls.mode', 'controls.state', 'controls.started_at', 'controls.ended_at')
            ->get()->toArray();
        $data = [
            "title" => "Homepage",
            "lamps" => $resp,
            "devices" => DevicesModel::all(),
            "users" => UsersModel::all(),
        ];
        return view("home.index", $data);
    }
}