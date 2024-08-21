<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->belongsTo(Tipo_Projeto::class, 'tipo');
    }

    public function status()
    {
        return $this->belongsTo(Status_Projeto::class,'status');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente');
    }

}
