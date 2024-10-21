<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TipoProjeto;
use App\Models\Cliente;
use App\Models\Delineamento;
use App\Models\Detalhamento;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'responsavel', //fk
        'numero_interno',
        'numero_externo',
        'tipo', //fk
        'status',
        'prioridade',
        'cliente', //fk
        'descricao',
        'inicio_prev_plan',
        'term_prev_plan',
        'inicio_real_plan',
        'term_real_plan',
        'status_plan',
        'inicio_prev_exec',
        'term_prev_exec',
        'inicio_real_exec',
        'term_real_exec',
        'status_exec'
    ];

   public function user()
    {
        return $this->belongsTo(User::class, 'responsavel');
    }
    
    public function tipoProjeto()
    {
        return $this->belongsTo(TipoProjeto::class, 'tipo');
    }

    public function clienteProjeto()
    {
        return $this->belongsTo(Cliente::class, 'cliente');
    }

    public function delineamento()
    {
        return $this->hasOne(Delineamento::class, 'projeto_id');
    }

    public function detalhamento()
    {
        return $this->hasOne(Detalhamento::class, 'projeto_id');
    }

    public function statusPlan(){
        return $this->hasOne(StatusPlan::class, 'id');
    }

    public function statusExec()
    {
        return $this->hasOne(StatusExec::class, 'id');
    }

    public function teo()
    {
        return $this->hasOne(TEO::class, 'projeto_id');
    }
}
