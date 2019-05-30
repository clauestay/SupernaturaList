@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                   <div class="panel-heading">
                       Editar Personaje
                   </div>
                   <div class="panel-body">
                       {!! Form::model($character, ['route' => ['characters.update', $character->id],
                       'method' => 'PUT', 'files' => true]) !!}
                            
                            @include('admin.characters.partials.form')
                            
                       {!! Form::close() !!}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection