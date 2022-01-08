@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/album/'.$album->id_album ) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="mb-3">
            <label class="form-label fw-bolder ">Artista:</label>
            <select class="form-select form-control bg-white" name="artista" required>
                <option value="{{ $album['artista'] }}" disabled selected>{{$album['artista']}}</option>
                @foreach ($artistas as $artista)
                <option value="{{$artista['nombre']}}" required>{{ $artista['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        @include('album.formulario',['modo'=>'Editar']);

    </form>
</div>
@endsection