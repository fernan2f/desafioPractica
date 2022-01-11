@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Algunos sencillos de nuestros artistas</h2>
            @foreach ($sencillos as $sencillo)

                <div class="card mx-1 my-1" style="width: 18rem;">
                    <img class="shadow h-100" style="" src="data:image/jpeg;base64,{{ $sencillo['imagen'] }}">
                    <div class="card-body">
                        <h5 class="card-title mb-4">{{ $sencillo['titulo'] }}</h5>
                        <p>Artista : <a
                                href="{{ url('/artistaPage/' . $sencillo->artista) }}">{{ $sencillo['artista'] }}</a>
                        </p>
                        <p class="card-text">Duración : {{ gmdate('i:s', $sencillo['duracion']) }} seg.</p>
                        <audio style="width:15rem;" controls onclick="console.log('hola');"
                            src="data:audio/mp3;base64,{{ $sencillo['audio'] }}"></audio>
                        <!-- <a href="#" class="btn btn-primary">Ver más del artista</a> -->
                    </div>
                </div>
            @endforeach

        </div>
        <?php $flag = 0; ?>

        <div class="row mt-5">

            @foreach ($albumes as $album)
                @if ($album['cantidad'] > 1)
                    @if ($flag == 0)
                        <h2>¿Buscas algún álbum? aquí tienes algunos</h2>

                        <?php $flag++; ?>
                    @endif
                    <div class="card mx-1 my-1" style="width: 18rem;">
                        <img class="shadow h-100" style="" src="data:image/jpeg;base64,{{ $album['imagen'] }}">
                        <div class="card-body">
                            <h5 class="card-title mb-4"><a
                                    href="{{ url('/albumPage/' . $album->id_album) }}">{{ $album['nombre'] }}</a></h5>
                            <p>Artista : <a
                                    href="{{ url('/artistaPage/' . $album->artista) }}">{{ $album['artista'] }}</a>
                            </p>
                            <p class="card-text">Duración : {{ gmdate('i:s', $album['duracion']) }} seg.</p>
                            <!-- <a href="#" class="btn btn-primary">Ver más del artista</a> -->
                        </div>
                    </div>
                @endif

            @endforeach

        </div>
    </div>
@endsection
