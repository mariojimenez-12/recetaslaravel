@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="titulo-categoria mt-5 mb-4">Resultados por: <span class="text-primary">{{ $busqueda }}</span></h2>

        <div class="row">
            @foreach($recetas as $receta)
                @include('ui.receta')          
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $recetas->links() }}
    </div>
@endsection