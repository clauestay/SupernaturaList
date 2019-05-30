@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Mis Personajes
                    <a href="{{ route('characters.create') }}"
                    class="btn btn-sm btn-primary float-right">
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
                            @foreach($characters as $character)
                            <tr>
                                <td>{{ $character->id }}</td>
                                <td>{{ $character->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('characters.show', $character->id) }}" 
                                        class="btn btn-sm btn-default">ver</a>
                                </td>
                                <td width="10px">
                                        <a href="{{ route('characters.edit', $character->id) }}" 
                                            class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['characters.destroy', $character->id], 
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
                    {{ $characters->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection