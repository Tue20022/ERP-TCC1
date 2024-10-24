<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Projeto;
use PhpParser\Node\Expr\FuncCall;

class ClienteProjetoController extends Controller
{
    public function clientes(Request $request)
    {
        try{     
            $cliente = new Cliente();
            $cliente->name = $request->nome_cliente;
            $cliente->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config')->with('error', 'Erro ao cadastrar cliente');
        }
    }

    public function clientesUpdate(Request $request, $id)
    {
        try {
            $cliente = Cliente::find($id);
            $cliente->name = $request->nome_cliente;
            $cliente->ativo = $request->ativo;
            if ($cliente->ativo == null) {
                $cliente->ativo = 0;
            }
            $cliente->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config')->with('error', 'Erro ao atualizar cliente');
        }
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
