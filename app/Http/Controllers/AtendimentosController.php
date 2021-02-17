<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atendimento;
use App\Paciente;
use App\Medico;
use Illuminate\Contracts\Validation\Validator;

class AtendimentosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = Atendimento::all();
        return view('atendimento.list')->with('atendimentos', $atendimentos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $atendimento = new Atendimento();
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('atendimentos.criar')->with('pacientes', $pacientes)
                                        ->with('medicos', $medicos)
                                        ->with('method', $method)
                                        ->with('atendimento', $atendimento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $atendimento = new Atendimento();

            $atendimento->idpaciente = $request->input('paciente_id');
            $atendimento->id_medico = $request->input('medico_id');
            $atendimento->inicio = $request->input('inicio');
            $atendimento->termino = $request->input('termino');
            $atendimento->save();

            return redirect()->route('atendimentos.index');

    }



    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = 'put';
        $atendimento = Atendimento::find($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('atendimentos.criar')->with('method', $method)
                                        ->with('atendimento', $atendimento)
                                        ->with('pacientes', $pacientes)
                                        ->with('medicos', $medicos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $atendimento = Atendimento::find($id);
            $atendimento->id_paciente = $request->input('paciente_id');
            $atendimento->id_medico = $request->input('medico_id');
            $atendimento->inicio = $request->input('inicio');
            $atendimento->termino = $request->input('termino');


            $atendimento->save();

            return redirect()->route('atendimentos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atendimento = Atendimento::find($id);

        $atendimento->delete();

        return redirect()->route('atendimento.index');
    }
}
