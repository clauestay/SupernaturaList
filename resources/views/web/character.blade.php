@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $character->name }}</h1>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Categoria
                    <a href="{{ route('category', $character->category->slug) }}">{{ $character->category->name }}</a>
                    </div>
                    <div class="panel-body">
                        @if($character->file)
                    <img src="{{ asset('images/'.$character->file) }}" class="img-fluid rounded" alt="">
                        @endif
                        {{ $character->except }}
                        <hr>
                        {!! $character->body !!}
                        <hr>
                        Temporadas
                        @foreach ($character->seasons as $season)
                    <a href="{{ route('season', $season->slug) }}">{{ $season->name }}</a>
                        @endforeach
                    </div>
                </div>
          </div>
    </div>
@endsection