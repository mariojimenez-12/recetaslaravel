@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

    @section('hero')
        <div class="hero-categorias">
            <form action="{{ route('buscar.show') }}" class="container h-100">
                @csrf
                <div class="row h-100 align-items-center">
                    <div class="col-md-4 texto-buscar">
                        <p class="display-4">Encuentra una receta para tu próxima comida</p>

                        <div class="d-flex">
                            <input type="search" name="buscar" class="form-control" placeholder="Buscar">
                            <i class="bi bi-search btn btn-light"></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Últimas recetas</h2>

        <div class="owl-carousel owl-theme">
            @foreach($nuevas as $nueva)
                    <div class="card">
                        <img src="/storage/{{ $nueva->imagen }}" alt="Imagen receta">
                        <div class="card-body">
                            <h3>{{ $nueva->titulo }}</h3>

                            <p>{!! Str::words(strip_tags($nueva->preparacion), 15) !!}</p>

                            <a href="{{ route('recetas.show', ['receta' => $nueva]) }}" class="btn btn-primary font-weight-bold text-uppercase">Ver receta</a>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-4">
        <h2 class="titulo-categoria">Recetas más votadas</h2>

        <div class="row">
                @foreach($votadas as $receta)
                    @include('ui.receta')
                @endforeach
        </div>
    </div>

    @foreach($recetas as $key => $grupo)
        <div class="container mt-4">
            <h2 class="titulo-categoria">{{ str_replace('-', ' ', $key) }}</h2>

            <div class="row">
                @foreach($grupo as $recetas)
                    @foreach($recetas as $receta)
                        @include('ui.receta')
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach

@endsection
