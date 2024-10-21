<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TEO extends Model
{
    use HasFactory;

    protected $table = 'teo';

    protected $fillable = [
        'nome_cliente',
        'cpf_cliente',
        'cpf_responsavel',
        'observacoes',
        'status',
        'anexo',
        'responsavel_id',
        'projeto_id'
    ];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }
}
