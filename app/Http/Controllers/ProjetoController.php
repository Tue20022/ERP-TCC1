<?php

namespace App\Http\Controllers;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Models\User;

class ProjetoController extends Controller
{
    public function index()
    {
        return view('projetos.index');
    }

    public function create()
    {
        //como passar uma lista de todos os usuários da tabela users
        $users = User::all();


        return view('projetos.create', compact('users'));
    }

    public function store(Request $request)
    {
        $projeto = new Projeto();
        $projeto->responsavel = $request->responsavel;
        $projeto->numero_interno = 'PJ-' . $request->numero_interno;
        $projeto->numero_externo = $request->numero_externo;
        $projeto->tipo = $request->tipo;
        $projeto->status = $request->status;
        $projeto->prioridade = $request->prioridade;
        $projeto->cliente = $request->cliente;
        $projeto->descricao = $request->descricao;
        $projeto->save();

        return redirect()->route('projetos.index');

    }
    
    public function config()
    {
        return view('projetos.config');
    }  
}
