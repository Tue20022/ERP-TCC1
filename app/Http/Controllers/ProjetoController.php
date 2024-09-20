<?php

namespace App\Http\Controllers;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StatusProjeto;
use App\Models\TipoProjeto;
use App\Models\Cliente;

class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = new Projeto();
        $projetos = $projetos->with('user', 'tipoProjeto', 'statusProjeto', 'clienteProjeto')->get();
        
        return view('projetos.index', compact('projetos'));
    }

    public function create()
    {
        $user = new User();
        $users = $user->where('ativo', true)->get();

        $status = new StatusProjeto();
        $status = $status->where('ativo', true)->get();

        $tipo = new TipoProjeto();
        $tipo = $tipo->where('ativo', true)->get();

        $cliente = new Cliente();
        $cliente = $cliente->where('ativo', true)->get();
       
        return view('projetos.create', compact('users', 'status', 'tipo', 'cliente'));
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
        $status = new StatusProjeto();
        $status = $status->all();

        $tipo = new TipoProjeto();
        $tipo = $tipo->all();

        $cliente = new Cliente();
        $cliente = $cliente->all();

        return view('projetos.config', compact('status', 'tipo', 'cliente'));
    } 

    public function edit($id)
    {
        $projeto = new Projeto();
        $projeto = $projeto->find($id);

        $user = new User();
        $users = $user->where('ativo', true)->get();

        $status = new StatusProjeto();
        $status = $status->where('ativo', true)->get();

        $tipo = new TipoProjeto();
        $tipo = $tipo->where('ativo', true)->get();

        $cliente = new Cliente();
        $cliente = $cliente->where('ativo', true)->get();

        return view('projetos.edit', compact('projeto', 'users', 'status', 'tipo', 'cliente'));
    }

    public function update(Request $request, $id)
    {
        $projeto = new Projeto();
        $projeto = $projeto->find($id);
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

    public function delete($id)
    {
        $projeto = new Projeto();
        $projeto = $projeto->find($id);
        $projeto->delete();

        return redirect()->route('projetos.index');
    }

}
