<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusExec extends Model
{
    use HasFactory;

    protected $table = 'statusExec';

    protected $fillable = [
        'nome',
        'ativo'
    ];

    public function statusExec()
    {
        return $this->belongsTo(Projeto::class, 'status_exec');
    }
}
