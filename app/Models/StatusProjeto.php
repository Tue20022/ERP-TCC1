<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProjeto extends Model
{
    use HasFactory;

    protected $table = "statusProjetos";

    protected $fillable = [
        'name',
        'ativo'
    ];

    public function projetos()
    {
        return $this->hasMany(Projeto::class, 'status');
    }
}
