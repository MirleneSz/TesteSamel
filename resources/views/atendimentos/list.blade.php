@extends('home')

@section('external_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Atendomentos
                    <a class="btn btn-primary pull-right" href="{{ route('atendimentos.create') }}">Novo</a>
                </div>
                <div class="panel-body">
                    <table id="atendimento_table" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Inicio</th>
                                <th>Término</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($atendimentos as $at )
                            <tr>
                                <td>{{ $at->id }}</td>
                                <td>{{ $at->paciente->nome }}</td>
                                <td>{{ $at->medico->nome }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime($atendimento->inicio)) }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime($atendimento->termino)) }}</td>

                                <td><a href="{{ route('atendimentos.edit', $atendimento->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></a></td>
                                 <td>
                                    <form action="{{ route('atendimentos.destroy', $atendimento->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
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
            $('#atendimento_table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            } );
        } );
    </script>
@endsection
