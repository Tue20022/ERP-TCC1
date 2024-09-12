<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        return view("home");
    }

    public function indexUsers()
    {
        $users = User::all();
        return view("config.indexUsers", compact('users'));
    }

    public function createUser()
    {
        return view("config.newUser");
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users', // Verifica se o login é único
            'password' => 'required|string|min:3|confirmed', // Verifica se as senhas conferem
        ]);

        // Verifica se a validação falhou
        if ($validator->fails()) {
            // Redireciona de volta para a rota 'registro' com as mensagens de erro
            return redirect()->route('config.createUser')
                ->withErrors($validator) // Passa os erros de validação
                ->withInput(); // Retorna os dados anteriores ao formulário
        }

        // if ($validator->fails()) {
        //     dd($validator->errors()); // Isso vai exibir os erros diretamente no navegador
        // }

        // Criação do novo usuário
        $user = new User();
        $user->name = $request->input('name');
        $user->login = $request->input('login');
        $user->password = Hash::make($request->input('password')); // Hash da senha
        $user->save(); // O Eloquent gerencia automaticamente o created_at e updated_at

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('config.indexUsers')->with('successMessage', 'Usuário cadastrado com sucesso');
    }

    public function editUser(User $user)
    {
        return view("config.editUser", compact('user'));
    }

    public function updateUser($id, Request $request)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('config.indexUsers')->with('errorMessage', 'Usuário não encontrado');
        }
        
        $user->name = $request->input('name');
        $user->login = $request->input('login');

        // Verifica se a senha 
        if ($request->input('password')!=null) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:3|confirmed', // Verifica se as senhas conferem
            ]);

            // Verifica se a validação falhou
            if ($validator->fails()) {
                // Redireciona de volta para a rota 'registro' com as mensagens de erro
                return redirect()->route('config.indexUsers', $user)
                    ->withErrors($validator) // Passa os erros de validação
                    ->withInput(); // Retorna os dados anteriores ao formulário
            }

            $user->password = Hash::make($request->input('password')); // Hash da senha
        }
        $user->save(); // O Eloquent gerencia automaticamente o created_at e updated_at

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('config.indexUsers')->with('successMessage', 'Usuário cadastrado com sucesso');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('config.indexUsers')->with('successMessage', 'Usuário deletado com sucesso');
    }

    public function disableUser($id)
    {
        $user = User::find($id);

        // Verifica se o usuário foi encontrado
        if (!$user) {
            return redirect()->route('users.indexUsers')->with('errorMessage', 'Usuário não encontrado');
        }

        $user->ativo = false;
        $user->save();
        return redirect()->route('config.indexUsers')->with('successMessage', 'Usuário desativado com sucesso');
    }

    public function enableUser($id)
    {
        $user = User::find($id);

        // Verifica se o usuário foi encontrado
        if (!$user) {
            return redirect()->route('users.indexUsers')->with('errorMessage', 'Usuário não encontrado');
        }

        $user->ativo = true;
        $user->save();
        return redirect()->route('config.indexUsers')->with('successMessage', 'Usuário ativado com sucesso');
    }

    // Permissões
    public function configPermission()
    {
        return view("config.indexPermission");
    }
}
