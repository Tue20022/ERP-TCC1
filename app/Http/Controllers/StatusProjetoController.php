<?php

namespace App\Http\Controllers;
use App\Models\StatusProjeto;
use Illuminate\Http\Request;

class StatusProjetoController extends Controller
{
   
    public function status(Request $request)
    {
        $status = new StatusProjeto();
        $status->status = $request->nome_status;
        $status->save();
        return redirect()->route('projetos.config');
    }

}
