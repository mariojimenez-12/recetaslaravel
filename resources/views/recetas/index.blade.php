@extends('layouts.app')

@section('botones')
        <a href="{{ route('recetas.create') }}" class="btn btn-outline-primary mr-2 mt-3 text-uppercase font-weight-bold">
            <svg class="icono w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Crear receta
        </a>
        <a href="{{ route('perfiles.edit', ['perfil' => Auth::user()->id ]) }}" class="btn btn-outline-success mr-2 mt-3 text-uppercase font-weight-bold">
            <svg class="icono w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>    
            Editar perfil
        </a>
        <a href="{{ route('perfiles.show', ['perfil' => Auth::user()->id ]) }}" class="btn btn-outline-info mr-2 mt-3 text-uppercase font-weight-bold">
            <svg class="icono w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Ver perfil
        </a>
@endsection

@section('content')

    <h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md10 mx-auto bg-white p-3">

        <table class="table">

            <thead class="bg-primary text-light">

                <tr>
                    <th class="text-center" scole="col">Título</th>
                    <th class="text-center" scole="col">Categoría</th>
                    <th class="text-center" scole="col">Acciones</th>
                </tr>

            </thead>

            <tbody>
                @foreach( $recetas as $receta)
                    <tr>


                        <td class="text-center">{{ $receta->titulo }}</td>

                        <td class="text-center">{{ $receta->categoria->nombre }}</td>

                        <td class="text-center">
                            <form action="{{ route('recetas.delete', ['receta' => $receta]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger d-block w-100 mb-1" value="Eliminar &times;">
                            </form>
                            <a href="{{ action('RecetaController@edit', ['receta' => $receta->id]) }}" class="btn btn-dark d-block  mb-1">Editar</a>
                            <a href="{{ action('RecetaController@show', ['receta' => $receta]) }}" class="btn btn-success d-block  mb-1">Ver</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>

        <h2 class="text-center my-5">Recetas que te gustan</h2>

        <div class="col-md-10 mx-auto bg-white p-3">
            @if( count($usuario->meGusta) > 0)
                <ul class="list-group">
                    @foreach($usuario->meGusta as $receta)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p>{{ $receta->titulo }}</p>

                            <a href="{{ route('recetas.show', ['receta' => $receta->id ]) }}" class="btn btn-outline-success text-uppercase">Ver receta</a>
                        </li>
                    @endforeach
                </ul>
                @else
                    <p class="text-center">Aún no tienes recetas Guardadas</p>
            @endif
        </div>
    </div>

@endsection