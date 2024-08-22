<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\TipoProjeto;
use App\Models\StatusProjeto;
use App\Models\Cliente;

class Projeto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'responsavel', //fk
        'numero_interno',
        'numero_externo',
        'tipo', //fk
        'status', //fk
        'prioridade',
        'cliente', //fk
        'descricao',
    ];

   public function user()
    {
        return $this->belongsTo(User::class, 'responsavel');
    }
    
    public function tipo()
    {
        return $this->belongsTo(TipoProjeto::class, 'tipo');
    }

    public function status()
    {
        return $this->belongsTo(StatusProjeto::class,'status');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente');
    }

}
