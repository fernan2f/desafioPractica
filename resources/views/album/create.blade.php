@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{url('/album')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bolder ">Artista:</label>
            <select class="form-select form-control bg-white" name="artista" required>
                <option value="" disabled selected>Seleccione el artista</option>
                @foreach ($artistas as $artista)
                <option value="{{ $artista['nombre']}}" required>{{ $artista['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        <h5>Género:</h5>
        @foreach($generos as $genero)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="select_question[{{ $genero->nombre }}]" id="counter_{{ $genero->nombre }}" value="{{$genero['nombre']}}">
            <label class="form-check-label" for="">
                {{$genero['nombre']}}
            </label>
        </div>
        @endforeach
        @include('album.formulario',['modo'=>'Crear']);

    </form>
</div>
@endsection