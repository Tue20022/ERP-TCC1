<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalhamento extends Model
{
    use HasFactory;

    protected $table = 'detalhamento';

    protected $fillable = [
        'projeto_id', //fk
        'responsavel_id', //fk
        'num_det',
        'tag',
        'peso',
        'area',
        'aprovador_id', //fk
        'status',
        'observacoes'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class);
    }

    public function aprovador()
    {
        return $this->belongsTo(User::class);
    }
}
