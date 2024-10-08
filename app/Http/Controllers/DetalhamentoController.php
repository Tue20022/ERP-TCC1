<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalhamento;
use App\Models\Projeto;
use App\Models\User;

class DetalhamentoController extends Controller
{
    public function index()
    {
        $detalhamentos = Detalhamento::all();
        return view('detalhamentos.index', compact('detalhamentos'));
    }   

    public function create()
    {
        $projetos = new Projeto;
        $projetos = $projetos->where('status', 'Em Detalhamento')->doesntHave('detalhamento')->get();
        $users = new User;
        $users = $users->where('ativo', 1)->get();
        
        return view('detalhamentos.create', compact('projetos', 'users'));
    }

    public function store (Request $request){
        $detalhamento = new Detalhamento;
        $detalhamento->projeto_id = $request->projeto_id;
        $detalhamento->responsavel_id = $request->responsavel_id;
        $detalhamento->num_det = $request->num_det;
        $detalhamento->tag = $request->tag;
        $detalhamento->peso = $request->peso;
        $detalhamento->area = $request->area;
        $detalhamento->aprovador_id = $request->aprovador_id;
        $detalhamento->status = $request->status;
        $detalhamento->observacoes = $request->observacoes;
        $detalhamento->save();
        return redirect()->route('detalhamentos.edit', $detalhamento->id);
    }

    public function edit ($id){
        $detalhamento = Detalhamento::find($id);
        $projetos = new Projeto;
        $projetos = $projetos->where('status', 'Em Detalhamento')->doesntHave('detalhamento')->get();
        $users = new User;
        $users = $users->where('ativo', 1)->get();
        return view('detalhamentos.edit', compact('detalhamento', 'projetos', 'users'));
    }

    public function update (Request $request, $id){

        try{
        $detalhamento = Detalhamento::find($id);
        $detalhamento->projeto_id = $request->projeto_id;
        $detalhamento->responsavel_id = $request->responsavel_id;
        $detalhamento->num_det = $request->num_det;
        $detalhamento->tag = $request->tag;
        $detalhamento->peso = $request->peso;
        $detalhamento->area = $request->area;
        $detalhamento->aprovador_id = $request->aprovador_id;
        $detalhamento->status = $request->status;
        $detalhamento->observacoes = $request->observacoes;
        $detalhamento->save();
        return redirect()->route('detalhamentos.edit', $id)->with('successMessage', 'Detalhamento atualizado com sucesso!');
        }
        catch(\Exception $e){
            return redirect()->route('detalhamentos.edit', $id)->with('errorMessage', 'Erro ao atualizar detalhamento!');
        }
    }

    public function delete ($id){
        $detalhamento = Detalhamento::find($id);
        $detalhamento->delete();
        return redirect()->route('detalhamentos.index');
    }
}
