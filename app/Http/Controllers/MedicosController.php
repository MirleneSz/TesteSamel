<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medico;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MedicosController extends Controller
{
    //

    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.list')->with('medico', $medicos);
    }

    public function listMedicos(){

        $medicos = Medico::all();
        return response()->json($medicos);
    }

    public function create(){

        $method = 'post';
        $medicos = new Medico();
        return view('medicos.criar')->with('method', $method)
                                    ->with('medico', $medicos);

        return redirect()->route('home.pacientes')->with('success', 'Paciente cadastrado com sucesso');

    }

    public function store(Request $request){

        $medico = new Medico();
        $medico->nome = $request->input('nome');
        $medico->especialidade = $request->input('especialidade');
        $medico->crm = $request->input('crm');
        $medico->save();

        return redirect()->route('medicos.list');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $method = 'put';
        $medico = Medico::find($id);
        return view('medicos.criar')->with('method', $method)
        ->with('medico', $medico);
    }

    public function update(Request $request, $id)
    {

            $medico = Medico::find($id);
            $medico->nome = $request->input('nome');
            $medico->especialidade= $request->input('especialidade');
            $medico->crm = $request->input('crm');
            $medico->save();

            return redirect()->route('medicos.list');

    }
    public function destroy($id)
    {
        $medico = Medico::find($id);

        $medico->delete();

        return redirect()->route('medicos.list');
    }


}
