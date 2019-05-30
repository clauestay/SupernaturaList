@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                   <div class="panel-heading">
                       Editar Temporada
                   </div>
                   <div class="panel-body">
                       {!! Form::model($season, ['route' => ['seasons.update', $season->id],
                       'method' => 'PUT']) !!}
                            
                            @include('admin.seasons.partials.form')
                            
                       {!! Form::close() !!}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection