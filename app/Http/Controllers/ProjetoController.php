<?php

namespace App\Http\Controllers;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TipoProjeto;
use App\Models\Cliente;

class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = new Projeto();
        $projetos = $projetos->with('user', 'tipoProjeto', 'clienteProjeto')->get();

        return view('projetos.index', compact('projetos'));
    }

    public function create()
    {
        $user = new User();
        $users = $user->where('ativo', true)->get();

        $tipo = new TipoProjeto();
        $tipo = $tipo->where('ativo', true)->get();

        $cliente = new Cliente();
        $cliente = $cliente->where('ativo', true)->get();

        return view('projetos.create', compact('users', 'tipo', 'cliente'));
    }

    public function store(Request $request)
    {
        try {
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
        } catch (\Exception $e) {
            return redirect()->route('projetos.create');
        }

    }

    public function config()
    {

        $tipo = new TipoProjeto();
        $tipo = $tipo->all();

        $cliente = new Cliente();
        $cliente = $cliente->all();

        return view('projetos.config', compact('tipo', 'cliente'));
    }

    public function edit($id)
    {
        $projeto = new Projeto();
        $projeto = $projeto->find($id);

        $user = new User();
        $users = $user->where('ativo', true)->get();

        $tipo = new TipoProjeto();
        $tipo = $tipo->where('ativo', true)->get();

        $cliente = new Cliente();
        $cliente = $cliente->where('ativo', true)->get();

        return view('projetos.edit', compact('projeto', 'users', 'tipo', 'cliente'));
    }

    public function update(Request $request, $id)
    {
        try {

            $projeto = new Projeto();
            $projeto = $projeto->find($id);
            $projeto->responsavel = $request->responsavel;
            $projeto->numero_interno = $request->numero_interno;
            $projeto->numero_externo = $request->numero_externo;
            $projeto->tipo = $request->tipo;
            $projeto->status = $request->status;
            $projeto->prioridade = $request->prioridade;
            $projeto->cliente = $request->cliente;
            $projeto->descricao = $request->descricao;
            $projeto->save();

            return redirect()->route('projetos.edit', $id);
        } catch (\Exception $e) {
            return redirect()->route('projetos.edit', $id);
        }
    }

    public function delete($id)
    {
        $projeto = new Projeto();
        $projeto = $projeto->find($id);
        $projeto->delete();

        return redirect()->route('projetos.index');
    }

}
