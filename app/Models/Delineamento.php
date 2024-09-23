<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delineamento extends Model
{
    use HasFactory;

    protected $table = 'delineamento';

    protected $fillable = [
        'projeto_id', //fk
        'num_del',
        'tipo',
        'disciplina_id', //fk
        'delineador_id', //fk
        'aprovador_id', //fk
        'necessidade_em',
        'status',
        'observacoes'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }

    public function disciplina()
    {
        return $this->belongsTo(DisciplinaDel::class, 'disciplina_id');
    }

    public function delineador()
    {
        return $this->belongsTo(User::class, 'delineador_id');
    }

    public function aprovador()
    {
        return $this->belongsTo(User::class, 'aprovador_id');
    }
}
