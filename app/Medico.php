<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';
    protected $primaryKey= 'idmedico';

    protected $fillable = [
        'nome',
        'especialidade',
        'crm',

    ];
    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class, 'idmedico', 'id');
    }
}
