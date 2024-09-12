<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProjeto extends Model
{
    use HasFactory;

    protected $table = "tipoProjetos";

    protected $fillable = [
        'name',
        'ativo'
    ];
}
