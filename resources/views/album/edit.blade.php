@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/album/'.$album->id_album ) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="mb-3">
            <label class="form-label fw-bolder ">Artista:</label>
            <select class="form-select form-control bg-white" name="artista" required>
                <option value="{{ $album['artista'] }}" selected>{{$album['artista']}}</option>
                @foreach ($artistas as $artista)
                <option value="{{$artista['nombre']}}" required>{{ $artista['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        @foreach($generos as $genero)
        @if(in_array($genero['id_genero'],$generosRelacion))
        <div class="form-check">
            <input type="checkbox" checked class="form-check-input" name="select_question[{{ $genero->nombre }}]" id="counter_{{ $genero->nombre }}" value="{{$genero['nombre']}}">
            <label class="form-check-label" for="">{{$genero['nombre']}}
            </label>
        </div>
        @else
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="select_question[{{ $genero->nombre }}]" id="counter_{{ $genero->nombre }}" value="{{$genero['nombre']}}">
            <label class="form-check-label" for="">{{$genero['nombre']}}
            </label>
        </div>
        @endif
        @endforeach

        @include('album.formulario',['modo'=>'Editar']);

    </form>
</div>
@endsection