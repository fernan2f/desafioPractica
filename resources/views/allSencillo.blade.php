@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mb-5">Sencillos</h1>
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Titulo</th>
                    <th>Reproducciones</th>
                    <th>Oyentes</th>
                    <th>Álbum</th>
                    <th>Artista</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sencillos as $sencillo)
                    <tr>
                        <td> <img class="shadow" style="width:100px"
                                src="data:image/jpeg;base64,{{ $sencillo['imagen'] }}"></td>
                        <td>{{ $sencillo['titulo'] }}</td>
                        <td>{{ $sencillo['reproducciones'] }}</td>
                        <td>{{ $sencillo['oyentes'] }}</td>
                        @foreach ($albumes as $album)
                            @if ($album['id_album'] == $sencillo['idAlbum'])
                                <td><a href="{{ url('/albumPage/' . $album->id_album) }}">{{ $album['nombre'] }}</a>
                                </td>
                            @endif
                        @endforeach
                        <td><a href="{{ url('/artistaPage/' . $sencillo->artista) }}">{{ $sencillo['artista'] }}</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
                }
            });
        });
    </script>

@endsection
