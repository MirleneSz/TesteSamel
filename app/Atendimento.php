<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    //

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'idmedico');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'idpaciente');
    }
}
