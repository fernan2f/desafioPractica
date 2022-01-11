@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <h2 class="mb-5">{{ $nombreArtista }}</h2>


        <div class="row">
            <h3>Sencillos</h3>
            @foreach ($sencillos as $sencillo)
                @if ($sencillo['artista'] == $nombreArtista)
                    <div class="card mx-1 my-1" style="width: 14rem;">
                        <img class="shadow h-100" style="" src="data:image/jpeg;base64,{{ $sencillo['imagen'] }}">
                        <div class="card-body">
                            <h5 class="card-title mb-4">{{ $sencillo['titulo'] }}</h5>
                            <p class="card-text">Artista : {{ $sencillo['artista'] }}</p>
                            <p class="card-text">Duración : {{ gmdate('i:s', $sencillo['duracion']) }} seg.</p>
                            <p class="card-text">Esta canción aparece en :
                                @foreach ($albumes as $album)
                                    @if ($sencillo['idAlbum'] == $album['id_album'])
                                        {{ $album['nombre'] }}

                                    @endif

                                @endforeach
                            </p>


                            <audio style="width:10rem;" controls
                                src="data:audio/mp3;base64,{{ $sencillo['audio'] }}"></audio>
                            <!-- <a href="#" class="btn btn-primary">Ver más del artista</a> -->
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="row">
            <?php $flag = 0; ?>

            @foreach ($albumes as $album)
                @if ($nombreArtista == $album['artista'] and $album['cantidad'] > 1)

                    @if ($flag == 0)
                        <h3>Álbumes</h3>
                        <?php $flag++; ?>
                    @endif
                    <div class="card mx-1 my-1" style="width: 14rem;">
                        <img class="shadow h-100" style="" src="data:image/jpeg;base64,{{ $album['imagen'] }}">
                        <h5 class="card-title "><a
                                href="{{ url('/albumPage/' . $album->id_album) }}">{{ $album['nombre'] }}</a></h5>
                        <p>Posee {{ $album['cantidad'] }} canciones con una duración total de
                            {{ gmdate('H', $album['duracion']) }} horas {{ gmdate('i', $album['duracion']) }} minutos
                            y
                            {{ gmdate('s', $sencillo['duracion']) }} segundos.</p>
                    </div>

                @endif
            @endforeach
            </p>


            <!-- <a href="#" class="btn btn-primary">Ver más del artista</a> -->
        </div>
        @foreach ($artistas as $artista)
            @if ($artista['nombre'] == $nombreArtista)
                <div class="card mb-3" style="max-width: 700px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="shadow w-100 h-100" style=""
                                src="data:image/jpeg;base64,{{ $artista['imagen'] }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $artista['nombre'] }}</h4>
                                <p class="card-text">{{ $artista['descripcion'] }}</p>
                                <p class="card-text">Fecha de nacimiento : {{ $artista['fecha_nac'] }}</p>
                                <p class="card-text">Oyentes : {{ $artista['oyentes'] }}</p>
                                <p class="card-text">Seguidores : {{ $artista['seguidores'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach



    </div>
@endsection
