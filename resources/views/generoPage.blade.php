@extends('layouts.app')

@section('content')


    <div class="container">
        <h2 class="my-5">Sencillos del género {{ $nombreGenero }} </h2>
        <div class="row">
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Artista</th>
                        <th>Fecha</th>
                        <th>Oyentes</th>
                        <th>Duración</th>
                        <th>Canción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($array as $arr)
                        @foreach ($sencillos as $sencillo)
                            @if ($sencillo['id_sencillo'] == $arr)
                                <tr>
                                    <td> <img class="shadow" style="width:100px"
                                            src="data:image/jpeg;base64,{{ $sencillo['imagen'] }}"></td>
                                    <td><a
                                            href="{{ url('/artistaPage/' . $sencillo->artista) }}">{{ $sencillo['artista'] }}</a>
                                    </td>
                                    <td>{{ $sencillo['fecha'] }}</td>
                                    <td>{{ $sencillo['oyentes'] }}</td>
                                    <td>{{ gmdate('H:i:s', $sencillo['duracion']) }}</td>
                                    <td> <audio style="" controls
                                            src="data:audio/mp3;base64,{{ $sencillo['audio'] }}"></audio></td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection('content')
