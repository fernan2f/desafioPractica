@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/sencillo/'.$sencillo->id_sencillo ) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="mb-3">
            <label class="form-label fw-bolder ">Álbum:</label>
            <select class="form-select form-control bg-white" name="idAlbum" required>
                <option value="{{$sencillo['idAlbum']}}" selected>{{ $sencillo['idAlbum']}}</option>
                @foreach ($albumes as $album)
                <option value="{{ $album['id_album']}}" required>{{ $album['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bolder ">Artista:</label>
            <select class="form-select form-control bg-white" name="artista" required>
                <option value="{{ $sencillo['artista']}}" required>{{ $sencillo['artista']}}</option>
                @foreach ($artistas as $artista)
                <option value="{{ $artista['nombre']}}" required>{{ $artista['nombre'] }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bolder ">Género:</label>
            <select class="form-select form-control bg-white" name="genero" required>
                <option value="" disabled selected>Seleccione un género</option>
                @foreach ($generos as $genero)
                <option value="{{ $genero['nombre']}}" required>{{ $genero['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        @include('sencillo.formulario',['modo'=>'Editar']);

    </form>
</div>
@endsection