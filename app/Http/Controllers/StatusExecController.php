<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusExec;

class StatusExecController extends Controller
{
    public function store(Request $request)
    {
        try {
            $statusExec = new StatusExec();
            $statusExec->nome = $request->nome;
            $statusExec->ativo = true;
            $statusExec->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $statusExec = StatusExec::find($id);
            $statusExec->nome = $request->nome;
            $statusExec->ativo = $request->ativo;
            if ($statusExec->ativo == null) {
                $statusExec->ativo = 0;
            }
            $statusExec->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }

    public function delete($id)
    {
        try {
            $statusExec = StatusExec::find($id);
            $statusExec->delete();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }

    public function disable($id)
    {
        try {
            $statusExec = StatusExec::find($id);
            $statusExec->ativo = false;
            $statusExec->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }

    public function enable($id)
    {
        try {
            $statusExec = StatusExec::find($id);
            $statusExec->ativo = true;
            $statusExec->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }
}
