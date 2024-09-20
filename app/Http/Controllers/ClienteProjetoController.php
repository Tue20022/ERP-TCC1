<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteProjetoController extends Controller
{
    public function clientes(Request $request)
    {
        $cliente = new Cliente();
        $cliente->name = $request->nome_cliente;
        $cliente->save();
        return redirect()->route('projetos.config');
    }

    public function clientesUpdate(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->name = $request->nome_cliente;
        $cliente->ativo = $request->ativo;
        if ($cliente->ativo == null) {
            $cliente->ativo = 0;
        }
        $cliente->save();
        return redirect()->route('projetos.config');
    }

    public function clientesDelete($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('projetos.config');
    }

    public function clientesDisable($id)
    {
        $cliente = Cliente::find($id);
        $cliente->ativo = 0;
        $cliente->save();
        return redirect()->route('projetos.config');
    }
    
    public function clientesEnable($id)
    {
        $cliente = Cliente::find($id);
        $cliente->ativo = 1;
        $cliente->save();
        return redirect()->route('projetos.config');
    }
}
