

@extends('home')
@section('conteudo')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Informe abaixo as informações do médico
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
                    <form action="{{ route('medicos.update', $medico->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    @else
                    <form action="{{ route('medicos.store') }}" method="post">
                        {{ csrf_field() }}


                    @endif


                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input id="nome" type="text" name="nome" class="form-control" placeholder="Nome..." value="{{ $medico->nome }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="especialidade">Especialidade</label>
                            <input id="especialidade" type="text" name="especialidade" value="{{ $medico->especiaidade }}" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="crm">CRM</label>
                            <input id="crm" type="text" name="crm" value="{{ $medico->crm }}" class="form-control" required/>
                        </div>



                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-default" href="{{ url('/medicos') }}">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

