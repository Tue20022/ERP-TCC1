<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logar(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        $user = Login::where('login', $login)->where('password', $password)->first();

        if ($user) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
