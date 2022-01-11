@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/sencillo/' . $sencillo->id_sencillo) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="mb-3">
                <label class="form-label fw-bolder ">Álbum:</label>
                <select class="form-select form-control bg-white" name="idAlbum" required>
                    <option value="{{ $sencillo['idAlbum'] }}" selected>{{ $sencillo['idAlbum'] }}</option>
                    @foreach ($albumes as $album)
                        <option value="{{ $album['id_album'] }}" required>{{ $album['nombre'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bolder ">Artista:</label>
                <select class="form-select form-control bg-white" name="artista" required>
                    <option value="{{ $sencillo['artista'] }}" required>{{ $sencillo['artista'] }}</option>
                    @foreach ($artistas as $artista)
                        <option value="{{ $artista['nombre'] }}" required>{{ $artista['nombre'] }}</option>
                    @endforeach

                </select>
            </div>

            <h5>Género</h5>
            @foreach ($generos as $genero)
                @if (in_array($genero['id_genero'], $generosRelacion))
                    <div class="form-check">
                        <input type="checkbox" checked class="form-check-input"
                            name="select_question[{{ $genero->nombre }}]" id="counter_{{ $genero->nombre }}"
                            value="{{ $genero['nombre'] }}">
                        <label class="form-check-label" for="">{{ $genero['nombre'] }}
                        </label>
                    </div>
                @else
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="select_question[{{ $genero->nombre }}]"
                            id="counter_{{ $genero->nombre }}" value="{{ $genero['nombre'] }}">
                        <label class="form-check-label" for="">{{ $genero['nombre'] }}
                        </label>
                    </div>
                @endif
            @endforeach
            Canción: <input type='file' name='audio' id='fup' /><br>
            <div class=" mb-3">
                <label for="" class="form-label">Duración (segundos) </label>
                <input type="text" readonly class="form-control bg-white" name="duracion" id="f_du"
                    aria-describedby="helpId" placeholder=""
                    value="{{ isset($sencillo->duracion) ? $sencillo->duracion : old('duracion') }}">
            </div>

            <audio id='audio'></audio>

            @include('sencillo.formulario',['modo'=>'Editar']);

        </form>
    </div>
    <script>
        // Code to get duration of audio /video file before upload - from: https://coursesweb.net/

        //register canplaythrough event to #audio element to can get duration
        var f_duration = 0; //store duration
        document.getElementById('audio').addEventListener('canplaythrough', function(e) {
            //add duration in the input field #f_du
            f_duration = Math.round(e.currentTarget.duration);
            document.getElementById('f_du').value = f_duration;
            URL.revokeObjectURL(obUrl);
        });

        //when select a file, create an ObjectURL with the file and add it in the #audio element
        var obUrl;
        document.getElementById('fup').addEventListener('change', function(e) {
            var file = e.currentTarget.files[0];
            //check file extension for audio/video type
            if (file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)) {
                obUrl = URL.createObjectURL(file);
                document.getElementById('audio').setAttribute('src', obUrl);
            }
        });
    </script>
@endsection
