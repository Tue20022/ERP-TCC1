<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

    public function registro()
    {
        return view('registro');
    }

    public function registrar(Request $request)
    {
        // Validação dos campos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users', // Verifica se o login é único
            'password' => 'required|string|min:3|confirmed', // Verifica se as senhas conferem
        ]);

        // Verifica se a validação falhou
        // if ($validator->fails()) {
        //     // Redireciona de volta para a rota 'registro' com as mensagens de erro
        //     return redirect()->route('registro')
        //         ->withErrors($validator) // Passa os erros de validação
        //         ->withInput(); // Retorna os dados anteriores ao formulário
        // }

        if ($validator->fails()) {
            dd($validator->errors()); // Isso vai exibir os erros diretamente no navegador
        }
        
        // Criação do novo usuário
        $user = new User();
        $user->name = $request->input('name');
        $user->login = $request->input('login');
        $user->password = Hash::make($request->input('password')); // Hash da senha
        $user->save(); // O Eloquent gerencia automaticamente o created_at e updated_at

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('login')->with('successMessage', 'Usuário cadastrado com sucesso');
    }


}
