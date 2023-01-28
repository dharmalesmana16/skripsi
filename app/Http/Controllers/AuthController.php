<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Sign in",
        ];
        return view('auth.login', $data);
    }
    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $checkAuth = UsersModel::where('username', $username)->first();

        if ($checkAuth) {
            $passVerify = $checkAuth->password;
            if (password_verify($password, $passVerify)) {
                if ($checkAuth->status == "PENDING") {
                    Session::flash('pending', "Your account is not active, please contact your admin !");
                    return redirect('/signin');
                } else {
                    session([
                        'nama' => $checkAuth->first_name . " " . $checkAuth->last_name,
                        'isLogin' => true,
                        'role' => $checkAuth->ROLE,
                    ]);

                    return redirect(url('/users'));
                }
            } else {
                Session::flash('error', "Password Anda Salah !");
                return back()->WithInput();
            }
        } else {
            Session::flash('error', "Username Tidak Terdaftar !");
            return back()->WithInput();
        }

    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/signin');
    }

    public function signup(Request $request)
    {
        if ($request->isMethod('get')) {
            $data = [
                "title" => "Registration page",
            ];
            return view("auth.register", $data);
        } elseif ($request->isMethod('post')) {

        }

    }
}