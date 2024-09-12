<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logar(Request $request)
    {
        $login = $request->input('login');
        $password = Hash::make($request->input('password'));

        try {
            User::where('login', $login)->where('password', $password)->first();
            return redirect()->route('home')->with('successMessage', 'Login efetuado com sucesso');
        } catch (\Exception $e) {
            Log::info('Usuário ou senha inválidos: ' . $e->getMessage());
            return redirect()->route('login')->with('errorMessage', 'Usuário ou senha inválidos');
        }
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
