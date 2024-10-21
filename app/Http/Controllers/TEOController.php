<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TEO;
use App\Models\Projeto;
use App\Models\User;
use App\Models\Cliente;

class TEOController extends Controller
{
    public function index()
    {
        $teos = TEO::all();
        return view('teo.index', compact('teos'));
    }

    public function create()
    {
        $projetos = Projeto::all();
        $users = User::where('ativo', 1)->get();
        return view('teo.create', compact('projetos', 'users'));
    }

    public function store(Request $request)
    {

            $teo = new TEO();
            $teo->projeto_id = $request->projeto;

            $projeto_id = Projeto::find($request->projeto);
            $cliente = Cliente::find($projeto_id->cliente);

            $teo->responsavel_id = $request->responsavel;
            $teo->cpf_responsavel = $request->cpf_responsavel;
            
            $teo->nome_cliente = $cliente->name;
            $teo->cpf_cliente = $request->cpf_cliente;
          
            $teo->observacoes = $request->observacoes;
            $teo->status = $request->status;
            $teo->anexo = $request->anexo;
            $teo->save();
            return redirect()->route('teo.index');
    
    }

    public function edit($id)
    {
        $projetos = Projeto::all();
        $users = User::where('ativo', 1)->get();
        $teo = TEO::find($id);
        return view('teo.edit', compact('teo', 'projetos', 'users'));
    }

    public function update(Request $request, $id)
    {
        try {
            $teo = TEO::find($id);
            $teo->projeto_id = $request->projeto_id;

            $projeto_id = Projeto::find($request->projeto);
            $cliente = Cliente::find($projeto_id->cliente);

            $teo->nome_cliente = $cliente->name;
            $teo->cpf_cliente = $request->cpf_cliente;
            $teo->responsavel_id = $request->responsavel_id;
            $teo->cpf_responsavel = $request->cpf_responsavel;
            $teo->observacoes = $request->observacoes;
            $teo->status = $request->status;
            $teo->anexo = $request->anexo;
            $teo->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config')->with('error', 'Erro ao atualizar TEO');
        }
    }

    public function destroy($id)
    {
        $teo = TEO::find($id);
        $teo->delete();
        return redirect()->route('projetos.config');
    }
}
