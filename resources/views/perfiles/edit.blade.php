@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 mt-3 text-uppercase font-weight-bold">
        <svg class="icono w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path></svg>
        Regresar</a>
@endsection

@section('content')

    <h1 class="text-center">Editar perfil</h1>

    <div class="row-justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="nombre">Nombre</label>

                    <input 
                        class="form-control @error('nombre') is-invalid @enderror" 
                        type="text"
                        name="nombre" 
                        id="nombre" 
                        placeholder="Tu nombre"
                        value="{{ $perfil->usuario->name }}" 
                        >
                        
                        @error('nombre')
                            <span class="invalid-feedback d-block mb-2 mt-0" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="url">Sitio web</label>

                    <input 
                        class="form-control @error('url') is-invalid @enderror" 
                        type="text"
                        name="url" 
                        id="url" 
                        placeholder="Tu sitio web"
                        value="{{ $perfil->usuario->url }}"
                        >
                        
                        @error('url')
                            <span class="invalid-feedback d-block mb-2 mt-0" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="biografia">Biografia</label>
                    <input type="hidden" name="biografia" id="biografia" 
                    value="{{ $perfil->biografia }}"
                    >

                    <trix-editor class="form-control @error('biografia') is-invalid @enderror" input="biografia"></trix-editor>
                    @error('biografia')
                        <span class="invalid-feedback d-block mb-2 mt-0" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Tu imagen</label>

                    <input type="file" name="imagen" id="imagen" class="form-control  @error('imagen') is-invalid @enderror">

                    @error('imagen')
                        <span class="invalid-feedback d-block mb-2 mt-0" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                @if($perfil->imagen)
                    <div class="mt-4 mb-4">
                        <p>Imagen actual:</p>

                        <img src="/storage/{{ $perfil->imagen }}" style="width: 200px" alt="Imagen Receta">
                    </div>
                @endif

                <div class="form-group">
                    <input 
                        type="submit" 
                        class="btn btn-primary"
                        value="Actualizar perfil">

                </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection