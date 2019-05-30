@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h5>Lista de Articulos</h5>
            @foreach ($characters as $character)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $character->name }}
                    </div>
                    <div class="panel-body">
                        @if($character->file)
                    <img src="{{ asset('images/'.$character->file) }}" class="img-fluid rounded" alt="">
                        @endif
                        {{ $character->except }}
                    <a href="{{ route('character', $character->slug) }}" class="btn btn-primary">Leer más...</a>
                    </div>
                </div>
            @endforeach
            {{$characters->render()}}
        </div>
    </div>
@endsection