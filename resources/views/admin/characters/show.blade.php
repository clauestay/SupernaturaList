@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Personaje</div>
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                    <img src="{{ asset('images/'.$character->file) }}" class="img-fluid rounded" alt="">

                    <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nombre: {{ $character->name }}</li>
                            {{-- <li class="list-group-item">Slug: {{ $character->slug }}</li> --}}
                            {{-- <li class="list-group-item">Except: {{ $character->except }}</li> --}}
                            <li class="list-group-item">Descripcion: {{ $character->body }}</li>
                          </ul>
                          
            </div>    
        </div>
    </div>
@endsection