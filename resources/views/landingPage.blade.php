@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($sencillos as $sencillo)

                <div class="card mx-1 my-1" style="width: 18rem;">
                    <img class="shadow" style="" src="data:image/jpeg;base64,{{ $sencillo['imagen'] }}">

                    <div class="card-body">
                        <h5 class="card-title mb-4">{{ $sencillo['titulo'] }}</h5>
                        <p class="card-text">Artista : {{ $sencillo['artista'] }}</p>

                        <p class="card-text">Duración : {{ gmdate('i:s', $sencillo['duracion']) }} seg.</p>
                        @foreach ($sencillo_generos->where('idSencillo', 5) as $sencillo_genero)
                            <p class="card-text">Aparece en :{{ $sencillo_genero['nombre'] }}</p>
                        @endforeach

                        <!-- <a href="#" class="btn btn-primary">Ver más del artista</a> -->
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
