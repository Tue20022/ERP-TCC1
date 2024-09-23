<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;
use App\Models\User;
use App\Models\Delineamento;
use App\Models\DisciplinaDel;

class DelineamentoController extends Controller
{
    public function index()
    {
        $delineamentos = Delineamento::all();
        return view('delineamentos.index', compact('delineamentos'));
    }

    public function create()
    {
        $projetos = new Projeto();
        $projetos = $projetos->where('status', 'Em Delineamento')->whereDoesntHave('delineamento')->get();
        $users = new User();
        $users = $users->where('ativo', true)->get();
        $disciplinas = new DisciplinaDel();
        $disciplinas = $disciplinas->where('ativo', true)->get();
        return view('delineamentos.create', compact('projetos', 'users', 'disciplinas'));
    }

    public function store(Request $request)
    {
        try {
            $delineamento = new Delineamento();
            $delineamento->projeto_id = $request->projeto;
            $delineamento->num_del = $request->num_del;
            $delineamento->tipo = $request->tipo_del;
            $delineamento->disciplina_id = $request->disciplina;
            $delineamento->delineador_id = $request->delineador;
            $delineamento->aprovador_id = $request->aprovador;
            $delineamento->necessidade_em = $request->necessidade_em;
            $delineamento->status = $request->status_del;
            $delineamento->observacoes = $request->observacoes;
            $delineamento->anexo = $request->anexo;
            $delineamento->save();
            return redirect()->route('delineamentos.edit', parameters: $delineamento->id);
        } catch (\Exception $e) {
            return redirect()->route('delineamentos.create');
        }
    }

    public function edit($id)
    {
        $delineamento = Delineamento::find($id);
        $projetos = new Projeto();
        $projetos = $projetos->where('status', 'Em Delineamento')->whereDoesntHave('delineamento')->get();
        $users = new User();
        $users = $users->where('ativo', true)->get();
        $disciplinas = new DisciplinaDel();
        $disciplinas = $disciplinas->where('ativo', true)->get();
        return view('delineamentos.edit', compact('delineamento', 'projetos', 'users', 'disciplinas'));
    }

    public function update(Request $request, $id)
    {
        try{
        $delineamento = Delineamento::find($id);
        $delineamento->projeto = $request->projeto;
        $delineamento->num_del = $request->num_del;
        $delineamento->tipo_del = $request->tipo_del;
        $delineamento->disciplina = $request->disciplina;
        $delineamento->delineador = $request->delineador;
        $delineamento->aprovador = $request->aprovador;
        $delineamento->necessidade_em = $request->necessidade_em;
        $delineamento->status_del = $request->status_del;
        $delineamento->observacoes = $request->observacoes;
        $delineamento->anexo = $request->anexo;
        $delineamento->save();
        return redirect()->route('delineamentos.edit', parameters: $delineamento->id);
        } catch (\Exception $e) {
            return redirect()->route('delineamentos.edit', parameters: $delineamento->id);
        }
    }

    public function delete($id)
    {
        $delineamento = Delineamento::find($id);
        $delineamento->delete();
        return redirect()->route('delineamentos.index');
    }

    public function config()
    {
        $disciplinas = new DisciplinaDel();
        $disciplinas = $disciplinas::all();
        return view('delineamentos.config', compact('disciplinas'));
    }
}
