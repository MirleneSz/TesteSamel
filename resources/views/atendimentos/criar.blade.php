@extends('home')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Faça o Atendimentos  médico
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    @if($method == 'put')
                    <form action="{{ route('atendimentos.update', $atendimento->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    @else
                    <form action="{{ route('atendimentos.store') }}" method="post">
                        {{ csrf_field() }}
                    @endif


                    <div class="form-group">
                        <label for="paciente_id">Paciente</label>
                        <select name="paciente_id" class="form-control" id="paciente_id" value="{{ $atendimento->idpaciente }}">
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" {{ $paciente->id == $atendimento->idpaciente ? 'selected="selected"' : ''}}> {{ $paciente->nome }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="medico_id">Médico</label>
                        <select name="medico_id" class="form-control" id="medico_id" value="{{ $atendimento->idmedico }}">
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}" {{ $medico->id == $atendimento->idmedico ? 'selected="selected"' : ''}}> {{ $medico->nome }} </option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="inicio">Inicio</label>
                            <input id="inicio" type="datetime-local" name="inicio" class="form-control" value="{{ strftime('%Y-%m-%dT%H:%M', strtotime($atendimento->inicio)) }}"/>
                        </div>

                        <div class="form-group">
                            <label for="termino">Término</label>
                            <input id="termino" type="datetime-local" name="termino" class="form-control" value="{{ strftime('%Y-%m-%dT%H:%M', strtotime($atendimento->termino)) }}"/>
                        </div>



                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-default" href="{{ url('/atendimentos') }}">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



