@extends('layouts.app')

@section('content')

    <div class="row">
        @foreach ($albumes as $album)
            @if ($album['id_album'] == $idAlbum)
                <h3>Estos son los sencillos de {{ $album['nombre'] }}</h3>

            @endif
        @endforeach
        @foreach ($sencillos as $sencillo)
            @if ($sencillo['idAlbum'] == $idAlbum)
                <div class="card mx-1 my-1" style="width: 18rem;">
                    <img class="shadow h-100" style="" src="data:image/jpeg;base64,{{ $sencillo['imagen'] }}">
                    <div class="card-body">
                        <h5 class="card-text">Titulo : {{ $sencillo['titulo'] }}</h5>
                        <h5 class="card-title mb-4">Artista :<a
                                href="{{ url('/artistaPage/' . $sencillo->artista) }}">{{ $sencillo['artista'] }}</a>
                            <p class="card-text">Duración : {{ gmdate('i:s', $sencillo['duracion']) }} seg.</p>
                            <!-- <a href="#" class="btn btn-primary">Ver más del artista</a> -->
                            <audio style="width:15rem;" controls
                                src="data:audio/mp3;base64,{{ $sencillo['audio'] }}"></audio>
                    </div>
                </div>

            @endif
        @endforeach

    </div>
    @foreach ($albumes as $album)
        @if ($album['id_album'] == $idAlbum)
            <h1 class="mt-5 mb-3">Información del álbum</h1>
            <div class="card mx-1 my-1" style="width: 18rem;">

                <p class="card-text">Fecha de lanzamiento : {{ $album['fecha'] }}</p>
                <p class="card-text">Cantidad de sencillos : {{ $album['cantidad'] }}</p>
                <p class="card-text">Duración : {{ gmdate('H:i:s', $album['duracion']) }}</p>
                <p class="card-text">Visitas : {{ $album['visitas'] }}</p>
                <p class="card-text">Artista : <a
                        href="{{ url('/artistaPage/' . $album->artista) }}">{{ $album['artista'] }}</a></p>

                <img class="shadow h-100" style="" src="data:image/jpeg;base64,{{ $album['imagen'] }}">
            </div>

        @endif
    @endforeach
@endsection
