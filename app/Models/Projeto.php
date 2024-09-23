<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TipoProjeto;
use App\Models\Cliente;

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

}
