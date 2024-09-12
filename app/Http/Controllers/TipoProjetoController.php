<?php

namespace App\Http\Controllers;
use App\Models\TipoProjeto;
use Illuminate\Http\Request;

class TipoProjetoController extends Controller
{
    public function tipo(Request $request)
    {
        $tipo = new TipoProjeto();
        $tipo->name = $request->nome_tipo;
        $tipo->save();
        return redirect()->route('projetos.config');
    }
}
