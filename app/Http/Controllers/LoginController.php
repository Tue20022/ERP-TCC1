<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logar(Request $request)
    {
 
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticado com sucesso.
            return redirect()->intended('home');
        }

        // Se a autenticação falhar.
        return back()->with('errorMessage', 'Credenciais incorretas.');
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
