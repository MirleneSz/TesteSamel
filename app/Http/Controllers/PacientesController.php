<?php



namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.list')->with('paciente', $pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $pacientes = new Paciente();
        return view('pacientes.criar')->with('method', $method)
                                     ->with('paciente', $pacientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $paciente = new Paciente();
            $paciente->nome = $request->input('nome');
            $paciente->telefone = $request->input('telefone');
            $paciente->plano = $request->input('plano');

            $paciente->save();

            return redirect()->route('pacientes.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $paciente = Paciente::find($id);
        return view('pacientes.criar')->with('method', $method)
        ->with('paciente', $paciente);
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

            $paciente = Paciente::find($id);
            $paciente->nome = $request->input('nome');
            $paciente->telefone = $request->input('telefone');
            $paciente->plano = $request->input('plano');

            $paciente->save();

            return redirect()->route('pacientes.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);

        $paciente->delete();

        return redirect()->route('pacientes.list');
    }
}
