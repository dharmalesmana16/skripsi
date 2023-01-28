<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MonitoringDevicesController extends Controller
{
    public function index($device = null)
    {
        $res = DB::table('devices')->where('nama_device', $device)->first();
        $resp = DB::table('controls')
            ->join('devices', 'controls.device_id', '=', 'devices.id')
            ->join('lamps', 'controls.lamp_id', '=', 'lamps.id')
            ->select('lamps.nama_lampu', 'lamps.status', 'devices.nama_device', 'controls.mode', 'controls.state', 'controls.started_at', 'controls.ended_at')
            ->get()->toArray();
        $data = [
            "title" => "Monitoring " . $res->nama_device,
            "lamps" => $resp,
        ];

        if ($res) {

            return view('monitorings.devices.index', $data);
        } else {
            echo "error";
        }
    }
}