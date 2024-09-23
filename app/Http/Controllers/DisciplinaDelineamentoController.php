<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisciplinaDel;

class DisciplinaDelineamentoController extends Controller
{
      public function store(Request $request)
      {
            try{
                  $disciplina = new DisciplinaDel();
                  $disciplina->name = $request->nome;
                  $disciplina->save();
                  return redirect()->route('delineamentos.config');
            } catch (\Exception $e) {
                  return redirect()->route('delineamentos.index')->with('error', value: 'Erro ao cadastrar disciplina');
            }
      }

      public function update(Request $request, $id)
      {
            try{
            $disciplina = DisciplinaDel::find($id);
            $disciplina->name = $request->nome;
            $disciplina->ativo = $request->ativo;
            if ($disciplina->ativo == null) {
                  $disciplina->ativo = 0;
            }
            $disciplina->save();
            return redirect()->route('delineamentos.config');
            } catch (\Exception $e) {
                  return redirect()->route('delineamentos.config')->with('error', value: 'Erro ao atualizar disciplina');
            }
      }

      public function delete($id)
      {
            $disciplina = DisciplinaDel::find($id);
            $disciplina->delete();
            return redirect()->route('delineamentos.config');
      }

      public function disable($id)
      {
            $disciplina = DisciplinaDel::find($id);
            $disciplina->ativo = 0;
            $disciplina->save();
            return redirect()->route('delineamentos.config');
      }

      public function enable($id)
      {
            $disciplina = DisciplinaDel::find($id);
            $disciplina->ativo = 1;
            $disciplina->save();
            return redirect()->route('delineamentos.config');
      }
}
