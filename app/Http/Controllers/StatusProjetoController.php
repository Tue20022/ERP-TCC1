<?php

namespace App\Http\Controllers;
use App\Models\StatusProjeto;
use Illuminate\Http\Request;

class StatusProjetoController extends Controller
{
   
    public function status(Request $request)
    {
        $status = new StatusProjeto();
        $status->name = $request->nome_status;
        $status->save();
        return redirect()->route('projetos.config');
    }

    public function statusUpdate(Request $request, $id)
    {
        $status = StatusProjeto::find($id);

        if ($status == null) {
            return redirect()->route('projetos.config');
        }
        
        $status->name = $request->nome_status;
        $status->ativo = $request->ativo;
        if ($status->ativo == null) {
            $status->ativo = 0;
        }
        $status->save();
        return redirect()->route('projetos.config');
    }

    public function statusDelete($id)
    {
        $status = StatusProjeto::find($id);
        if ($status == null) {
            return redirect()->route('projetos.config');
        }
        $status->delete();
        return redirect()->route('projetos.config');
    }

    public function statusDisable($id)
    {
        $status = StatusProjeto::find($id);
        if ($status == null) {
            return redirect()->route('projetos.config');
        }
        $status->ativo = 0;
        $status->save();
        return redirect()->route('projetos.config');
    }

    public function statusEnable($id)
    {
        $status = StatusProjeto::find($id);
        if ($status == null) {
            return redirect()->route('projetos.config');
        }
        $status->ativo = 1;
        $status->save();
        return redirect()->route('projetos.config');
    }

}
