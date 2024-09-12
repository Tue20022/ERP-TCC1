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

    public function tipoUpdate(Request $request, $id)
    {
        $tipo = TipoProjeto::find($id);
        $tipo->name = $request->nome_tipo;
        $tipo->ativo = $request->ativo;
        if ($tipo->ativo == null) {
            $tipo->ativo = 0;
        }
        $tipo->save();
        return redirect()->route('projetos.config');
    }

    public function tipoDelete($id)
    {
        $tipo = TipoProjeto::find($id);
        $tipo->delete();
        return redirect()->route('projetos.config');
    }

    public function tipoDisable($id)
    {
        $tipo = TipoProjeto::find($id);
        $tipo->ativo = 0;
        $tipo->save();
        return redirect()->route('projetos.config');
    }

    public function tipoEnable($id)
    {
        $tipo = TipoProjeto::find($id);
        $tipo->ativo = 1;
        $tipo->save();
        return redirect()->route('projetos.config');
    }
}
