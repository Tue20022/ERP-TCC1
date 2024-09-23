<?php

namespace App\Http\Controllers;
use App\Models\TipoProjeto;
use Illuminate\Http\Request;

class TipoProjetoController extends Controller
{
    public function tipo(Request $request)
    {
        try {
            $tipo = new TipoProjeto();
            $tipo->name = $request->nome_tipo;
            $tipo->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config')->with('error', 'Erro ao cadastrar tipo');
        }
    }

    public function tipoUpdate(Request $request, $id)
    {
        try {
            $tipo = TipoProjeto::find($id);
            $tipo->name = $request->nome_tipo;
            $tipo->ativo = $request->ativo;
            if ($tipo->ativo == null) {
                $tipo->ativo = 0;
            }
            $tipo->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config')->with('error', 'Erro ao atualizar tipo');
        }
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
