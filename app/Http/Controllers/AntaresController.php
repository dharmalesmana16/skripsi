<?php

namespace App\Http\Controllers;

use App\Models\ControllingModel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

// use Ill
class AntaresController extends Controller
{
    protected $ACCESSKEY;
    protected $CONTROLLING;
    protected $URL;
    protected $PORT;
    protected $APPNAME;
    protected $DEVICENAME;
    protected $CLIENT;
    protected $HEADER;
    // use CodeIgniter\HTTP\IncomingRequest;
    // {{protocol}}://{{IPorDomain}}:{{port}}/~/{{cse-id}}/{{cse-name}}/{{application-name}}/{{device-name}}/la
    public function __construct()
    {
        // $this->client = \Config\Services::curlrequest();
        $this->CLIENT = new Client();
        $this->CONTROLLING = new ControllingModel;
        $this->ACCESSKEY = env('ANTARES.ACCESSKEY');
        $this->PORT = 8443;
        $this->APPNAME = env('ANTARES.APPNAME');
        $this->DEVICENAME = env('ANTARES.DEVICENAME');
        $this->URL = env('ANTARES.URL') . ":" . $this->PORT . "/~/antares-cse/antares-id/" . $this->APPNAME . "/" . $this->DEVICENAME;
        $this->URLD = env('ANTARES.URL') . ":" . $this->PORT . "/~/antares-cse/antares-id/" . $this->APPNAME;
    }
    // public function getData(){
    //     echo $this->URL;
    // }
    public function retDataDevice(Request $request)
    {
        $headers = [
            'X-M2M-Origin' => $this->ACCESSKEY,
            'Content-Type' => 'application/json',
        ];
        $reqparam = $request->input('devicename');

        $response = Http::withHeaders($headers)->get($this->URLD . "/" . $reqparam);
        return $response->json();
        if ($reqparam === false) {
            return response()->json([
                "status" => 500,
                "msg" => "Device name not found !",
            ], 500);
        }
    }
    public function retAllDataDevice()
    {
        $headers = [
            'X-M2M-Origin' => $this->ACCESSKEY,
            'Content-Type' => 'application/json',
        ];

        $response = Http::withHeaders($headers)->get($this->URLD . "?fu=1&ty=3");
        return $response->json();

    }
    public function retLastestData($devicename = false)
    {
        $headers = [
            'X-M2M-Origin' => $this->ACCESSKEY,
            'Content-Type' => 'application/json',
        ];
        if ($devicename === false) {
            return response()->json([
                "status" => 500,
                "msg" => "Device name not found !",
            ], 500);
        }
        $response = Http::withHeaders($headers)->get($this->URLD . "/" . $devicename . "/la");
        return $response->json();

    }
    public function action(Request $request, $resourceType = 4)
    {

        $id = $request->id; // nama_state
        $mode = $request->mode;

        $tyParam = '';
        if ($resourceType) {
            $tyParam = ';ty=' . $resourceType;
        }
        $header = [
            'Content-Type' => 'application/json' . $tyParam,
            'X-M2M-Origin' => $this->ACCESSKEY,
            'Accept' => 'application/json',
        ];
        if ($mode == "AUTO") {
            $started_at = $request->started_at;
            $ended_at = $request->ended_at;
            $dataPre = [
                "mode" => $mode,
                // "port" => $ports,
                "started_at" => $started_at,
                "ended_at" => $ended_at,
            ];
        } else {
            $port = $request->ports;
            $state = $request->state;
            $ports = $port . $id;

            $dataPre = [
                "mode" => $mode,
                "port" => $ports,
                "state" => $state,
            ];
        }
        $res = json_encode($dataPre);
        $dataReq = [
            "m2m:cin" => [
                "con" => $res,
            ],
        ];
        $response = Http::withHeaders($header)->post($this->URL, $dataReq);
        if ($response->status() >= 200 && $response->status() <= 300) {

            if ($mode == "AUTO") {
                DB::table('controls')
                    ->where('nama_state', $id)
                    ->update([
                        'started_at' => $started_at,
                        'ended_at' => $ended_at,
                        'mode' => $mode,
                    ]);
            } else {
                DB::table('controls')
                    ->where('nama_state', $id)
                    ->update([
                        'state' => $state,
                        'mode' => $mode,
                        'started_at' => null,
                        'ended_at' => null,
                    ]);
            }
        }

        return $response->json();
    }

}