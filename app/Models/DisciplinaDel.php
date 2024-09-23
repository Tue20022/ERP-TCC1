<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaDel extends Model
{
    use HasFactory;

    protected $table = 'disciplina_del';

    protected $fillable = [
        'name',
        'ativo'
    ];

    public function delineamento()
    {
        return $this->hasMany(Delineamento::class);
    }

}
