@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Categoria</div>
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nombre: {{ $category->name }}</li>
                            <li class="list-group-item">Slug: {{ $category->slug }}</li>
                            <li class="list-group-item">Descripcion: {{ $category->body }}</li>
                          </ul>
            </div>    
        </div>
    </div>
@endsection