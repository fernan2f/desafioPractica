@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container">

        <a href="{{ url('sencillo/create') }}" class="btn btn-secondary mb-5">Agregar un nuevo sencillo</a>

        @if (Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Reproducciones</th>
                    <th>Duración</th>
                    <th>Artista</th>
                    <th>Album</th>
                    <th>Canción</th>
                    <th>Imagen</th>

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sencillos as $sencillo)
                    <tr>
                        <td>{{ $sencillo->id_sencillo }}</td>
                        <td>{{ $sencillo->titulo }}</td>
                        <td>{{ $sencillo->fecha }}</td>
                        <td>{{ $sencillo->reproducciones }}</td>
                        <td>{{ gmdate('i:s', $sencillo->duracion) }}</td>
                        <td>{{ $sencillo->artista }}</td>
                        <td>
                            @foreach ($albumes as $album)
                                @if ($album->id_album === $sencillo->idAlbum)
                                    {{ $album['nombre'] }}
                                @endif
                            @endforeach
                        </td>

                        <td>
                            <audio id="audio1" controls src="data:audio/mp3;base64,{{ $sencillo['audio'] }}"></audio>
                        </td>
                        <td>

                            <img class="shadow" style="width:100px"
                                src="data:image/jpeg;base64,{{ $sencillo['imagen'] }}">
                        </td>
                        <td>
                            <a href="{{ url('/sencillo/' . $sencillo->id_sencillo . '/edit') }}"
                                class="btn btn-primary my-1">Editar</a>
                            <form action="{{ url('/sencillo/' . $sencillo->id_sencillo) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿ Seguro que deseas eliminar ?')"
                                    value="Borrar" class="btn btn-danger">
                            </form>
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
