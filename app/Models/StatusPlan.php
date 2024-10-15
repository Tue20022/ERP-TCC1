<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPlan extends Model
{
    use HasFactory;

    protected $table = 'statusPlan';

    protected $fillable = [
        'nome',
        'ativo'
    ];

    public function statusPlan()
    {
        return $this->belongsTo(Projeto::class, 'status_plan');
    }
}
