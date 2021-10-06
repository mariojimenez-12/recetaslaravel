<div class="col-md-4 mt-2">
    <div class="card shadow">
        <img src="/storage/{{ $receta->imagen }}" alt="Imagen receta" class="card-img-top">
        <div class="card-body">
            <h3 class="card-title">{{ $receta->titulo }}</h3>
            <div class="meta-receta d-flex justify-content-between">
                @php
                    $fecha = $receta->created_at
                @endphp
                <p>
                    <span>Creada el: </span><fecha-receta class="text-primary fecha font-weight-bold" fecha="{{ $fecha }}"></fecha-receta>
                </p>
                <p>
                    {{ count($receta->likes) }} les gustó
                </p>
            </div>
            <p class="card-text">{!! Str::words(strip_tags($receta->preparacion), 20, '...') !!}</p>
            <a class="btn btn-primary" href="{{ route('recetas.show', ['receta' => $receta]) }}">Ver receta</a>
        </div>
    </div>
</div>