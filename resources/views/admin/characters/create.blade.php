@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                   <div class="panel-heading">
                       Crear Personaje
                   </div>
                   <div class="panel-body">
                       {!! Form::open(['route' => 'characters.store', 'files' => true]) !!}
                            
                            @include('admin.characters.partials.formCreate')

                       {!! Form::close() !!}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection