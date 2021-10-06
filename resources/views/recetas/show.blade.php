@extends('layouts.app')

@section('content')

    <article class="contenido-receta bg-white p-5 shadow">
        <h1 class="text-center mb-4">{{ $receta->titulo }}</h1>

        <div class="imagen-receta">
            <img class="w-100" src="{{ asset("/storage/$receta->imagen") }}" alt="Imagen receta">
        </div>

        <div class="receta-meta mt-5">
            <p>Escrito en: <a href="{{ route('categorias.show', ['categoriaReceta' => $receta->categoria->id]) }}">{{ $receta->categoria->nombre }}</a></p>
            <p>
                Autor:
                <a href="{{ route('perfiles.show', ['perfil' => $receta->autor->id]) }}">{{ $receta->autor->name }}</a>
                {{--TODO: mostrar el usuario--}}
            </p>
            <p>
                Fecha:
                @php
                    $fecha = $receta->created_at
                @endphp
                <span class="font-weight-bold text-primary"><fecha-receta fecha="{{ $fecha }}"></fecha-receta></span>

                
            </p>

           
 
            <div class="ingredientes">
                <h2 class="my-2 text-primary">Ingredientes</h2>
                {!! $receta->ingredientes !!}
            </div>

            <div class="ingredientes">
                <h2 class="my-2 text-primary">Preparación</h2>
                {!! $receta->preparacion !!}
            </div>

            <div class="justify-content-center row text-center">
                <like-button
                    receta-id="{{ $receta->slug }}"
                    like="{{ $like }}"
                    likes="{{$likes}}"
                ></like-button>
            </div>

        </div>
    </article>
    
@endsection