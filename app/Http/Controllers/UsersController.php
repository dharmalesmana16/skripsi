<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $users;
    public function __construct()
    {
        $this->users = new UsersModel;
    }
    public function index()
    {
        $data = [
            "title" => "Users Page",
            "users" => $this->users->getData(),
        ];
        return view("config.users.index", $data);

    }
    // public function show(Request $request, $meta)
    // {
    //     $datadevice = $this->devices->getData($meta);
    //     $data = [
    //         "dataDevice" => $datadevice,
    //     ];

    //     $msg = [
    //         'data' => view("config.devices.show", $data),
    //     ];
    //     echo json_encode($msg);

    // }
    function new (Request $request) {
        $data = [
            "title" => "Create New Users",
        ];
        if ($request->isMethod("get")) {

            return view("config.users.create", $data);
        } elseif ($request->isMethod('post')) {
            $mode = $request->input("mode");
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $username = $request->input('username');
            $email = $request->input('email');
            $role = $request->input('role');
            $password = password_hash($request->input('password'), PASSWORD_BCRYPT);
            $handphone = $request->input('handphone');
            $status = "ACTIVE";
            if ($mode == "newfrRegister") {
                $password = password_hash($request->input('password'), PASSWORD_BCRYPT);
                $role = '-';
                $status = 'PENDING';
            }

            $this->users::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $email,
                'handphone' => $handphone,
                'password' => $password,
                'role' => $role,
                'status' => $status,
            ]);
            return redirect('/users');

        }

    }

    // public function update(Request $request, $id)
    // {

    // }
    // public function delete($id)
    // {

    // }
}