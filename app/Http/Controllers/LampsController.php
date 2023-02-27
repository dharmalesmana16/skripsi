<?php

namespace App\Http\Controllers;

use App\Models\LampsModel;
use Illuminate\Http\Request;

class LampsController extends Controller
{
    protected $lamps;
    public function __construct()
    {
        $this->lamps = new LampsModel;
    }
    public function index()
    {
        $data = [
            "title" => "Data Lamps Page",
            "lamps" => $this->lamps->getData(),
        ];
        return view('config.lamps.index', $data);
    }
    public function update()
    {

    }
    public function show(Request $request, $meta)
    {
        // $msg = [
        // "title"
        // ];
        $data = [
            "dataLamp" => $this->lamps->getData($meta),
            "title" => "Data Devices | Jasamarga Bali Tol",
        ];
        $msg = [
            'data' => view('config.lamps.show', $data),
        ];
        echo json_encode($msg);

        // return view('config.lamps.show', $data);

    }
}
