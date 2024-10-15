<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPlan;

class StatusPlanController extends Controller
{
    public function store(Request $request)
    {
        try {
            $statusPlan = new StatusPlan();
            $statusPlan->nome = $request->nome;
            $statusPlan->ativo = true;
            $statusPlan->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $statusPlan = StatusPlan::find($id);
            $statusPlan->nome = $request->nome;
            $statusPlan->ativo = $request->ativo;
            if ($statusPlan->ativo == null){
                $statusPlan->ativo = 0;
            }
            $statusPlan->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }

    public function delete($id)
    {
        try {
            $statusPlan = StatusPlan::find($id);
            $statusPlan->delete();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }

    public function disable($id)
    {
        try {
            $statusPlan = StatusPlan::find($id);
            $statusPlan->ativo = false;
            $statusPlan->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }

    public function enable($id)
    {
        try {
            $statusPlan = StatusPlan::find($id);
            $statusPlan->ativo = true;
            $statusPlan->save();
            return redirect()->route('projetos.config');
        } catch (\Exception $e) {
            return redirect()->route('projetos.config');
        }
    }
}
