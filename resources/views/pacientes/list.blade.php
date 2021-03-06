@extends('home')
@section('conteudo')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Pacientes
                    <a class="btn btn-primary pull-right" href="{{ route('pacientes.create') }}">Novo</a>
                </div>
                <div class="panel-body">
                    <table id="paciente_table" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Plano</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paciente as $pac)
                            <tr>
                                <td>{{ $pac->id }}</td>
                                <td>{{ $pac->nome }}</td>
                                <td>{{ $pac->telefone }}</td>
                                <td>{{ $pac->plano }}</td>

                                <form action ="{{route('create-paciente')}}" method="POST">
                                <td><a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></a></td>
                                 <td>
                                    <form action="{{ route('pacientes.destroy', $paciente->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('external_js')
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#medico_table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            } );
        } );
    </script>
@endsection
