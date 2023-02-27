<?php

namespace App\Http\Controllers;

use App\Models\DevicesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DevicesController extends Controller
{
    protected $devices;
    public function __construct()
    {
        $this->devices = new DevicesModel;
    }
    public function index()
    {
        $data = [
            "title" => "Devices Page",
            "devices" => $this->devices->getData(),
        ];
        return view("config.devices.index", $data);

    }
    public function show(Request $request, $meta)
    {
        $datadevice = $this->devices->getData($meta);
        $data = [
            "dataDevice" => $datadevice,
        ];

        $msg = [
            'data' => view("config.devices.show", $data),
        ];
        echo json_encode($msg);

    }
    function new (Request $request) {
        $data = [
            "title" => "Create New Device",
        ];
        if ($request->isMethod("get")) {

            return view("config.devices.create", $data);
        } elseif ($request->isMethod('post')) {

            $nama_device = $request->input('device_name');
            $brand_device = $request->input('brand_device');
            $ipaddress = $request->input('ip1') . "." . $request->input('ip2') . "." . $request->input('ip3') . "." . $request->input('ip4');
            $macaddress = $request->input('mac');
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
            $meta = Str::lower($nama_device);
            $status = "ACTIVE";

            $this->devices::create([
                'nama_device' => $nama_device,
                'brand_device' => $brand_device,
                'ipaddress' => $ipaddress,
                'macaddress' => $macaddress,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'meta' => $meta,
                'status' => $status,
            ]);
            return redirect('/devices');

        }

    }

    public function update(Request $request, $meta)
    {
        $data = [
            "title" => "Edit Page",
            "dataDevice" => $this->devices->getData($meta),
        ];
        if ($request->isMethod('get')) {

            return view('config.devices.edit', $data);
        } else {

            $devices = $this->devices::find($meta);
            $devices->nama_device = $request->nama_device;
            $devices->brand_device = $request->brand_device;
            $devices->ipaddress = $request->ip;
            $devices->macaddress = $request->mac;
            $devices->meta = Str::slug($request->nama_device);
            $devices->latitude = $request->latitude;
            $devices->longitude = $request->longitude;
            $devices->save();
            return redirect('/devices');
        }

    }
    // public function delete($id)
    // {

    // }
}
