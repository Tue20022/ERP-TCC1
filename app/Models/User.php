<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      
        'nome',
        'login',
        'password',
        'ativo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }

    public function projetos(){
        return $this->hasMany(Projeto::class, 'responsavel');
    }

    public function delineamentos(){
        return $this->hasMany(Delineamento::class, 'delineador_id');
    }

    public function detResponsavel(){
        return $this->hasOne(Detalhamento::class, 'responsavel_id');
    }

    public function detAprovador(){
        return $this->hasOne(Detalhamento::class, 'aprovador_id');
    }

    public function teoResponsavel(){
        return $this->hasMany(TEO::class, 'responsavel_id');
    }
}
