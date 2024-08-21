<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProjetoController extends Controller
{
    public function index()
    {
        return view('projetos.index');
    }

    public function create()
    {
        return view('projetos.create');
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
}
