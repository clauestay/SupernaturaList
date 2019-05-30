@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listado de Temporadas
                    <a href="{{ route('seasons.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                    Crear
                    </a>
                    </div>
                <div class="panel-body">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach($seasons as $season)
                            <tr>
                                <td>{{ $season->id }}</td>
                                <td>{{ $season->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('seasons.show', $season->id) }}" 
                                        class="btn btn-sm btn-default">ver</a>
                                </td>
                                <td width="10px">
                                        <a href="{{ route('seasons.edit', $season->id) }}" 
                                            class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['seasons.destroy', $season->id], 
                                        'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                            </tr>
                            @endforeach
                        </body>
                    </table>
                    {{ $seasons->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection