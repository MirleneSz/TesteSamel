<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'plano',

    ];

    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class, 'idpaciente', 'id');
    }
}
