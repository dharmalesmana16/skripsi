<?php

namespace App\Http\Controllers;

use App\Models\ControllingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllingController extends Controller
{
    protected $controls;
    public function __construct()
    {
        $this->controls = new ControllingModel;
    }

    public function index()
    {
        $db = DB::table('controls')
            ->join('devices', 'controls.device_id', '=', 'devices.id')
            ->join('lamps', 'controls.lamp_id', '=', 'lamps.id')
            ->select("controls.*", "devices.nama_device", "devices.id", "lamps.nama_lampu", "lamps.id")
            ->get()->toArray();
        $data = [
            "title" => "Devices Page",
            "controls" => $db,

        ];
        return view("controlling.index", $data);

        //     $querydata = $db->query("SELECT nama_device FROM datadevice");
        //     // $query = $db->query("SELECT datadevice.id,datadevice.nama_device,devicecontrol.port as port,.devicecontrol.mode as mode,devicecontrol.state,devicecontrol.nama_state,devicecontrol.id as datadevice_id
        //     // -- FROM devicecontrol INNER JOIN datadevice ON devicecontrol.datadevice_id = datadevice.id ");
        //     $query = $db->query("SELECT datalampu.id,datalampu.nama_lampu,datadevice.nama_device,devicecontrol.port as port ,devicecontrol.started_at,devicecontrol.ended_at, devicecontrol.mode as mode,devicecontrol.state,devicecontrol.nama_state,devicecontrol.id as datadevice_id
        //     FROM ((devicecontrol INNER JOIN datalampu ON devicecontrol.datalampu_id = datalampu.id) INNER JOIN datadevice ON devicecontrol.datadevice_id = datadevice.id) ");

        // $result = $query->getResultArray();
    }

    function new (Request $request) {
        if ($request->isMethod('get')) {
            $data = [
                "title" => "New Controlling Page",
                "controls" => $this->controls->getData(),
            ];
            return view('controlling.create', $data);
        }
    }

    public function create()
    {
    }

    public function edit($id = null)
    {
    }

    public function update($id = null)
    {
    }

    public function delete($id = null)
    {
    }

    public function indextimer($controlsId = null)
    {
        $res = DB::table('controls')->where('id', $controlsId)->first();
        $data = [
            "title" => "Setting Timer $res->nama_state",
            "dataDevice" => $res,
        ];
        return view('controlling.setting.index', $data);
    }
    public function updatetimer($controlsId = null)
    {
        // $res = DB::table('controls')->where('id', $controlsId)->first();

    }
}