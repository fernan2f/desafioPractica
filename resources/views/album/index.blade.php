@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection


@section('content')

    <div class="container">

        <a href="{{ url('album/create') }}" class="btn btn-secondary mb-5">Agregar un nuevo álbum</a>

        @if (Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Canciones</th>
                    <th>Duracion</th>
                    <th>Fecha</th>
                    <th>Artista</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albumes as $album)
                    <tr>
                        <td>{{ $album->id_album }}</td>
                        <td>{{ $album->nombre }}</td>
                        <td>{{ $album->cantidad }}</td>
                        <td>{{ gmdate('H:i:s', $album->duracion) }}</td>
                        <td>{{ $album->fecha }}</td>
                        <td>{{ $album->artista }}</td>
                        <td>
                            <img class="shadow" style="width:100px"
                                src="data:image/jpeg;base64,{{ $album['imagen'] }}">


                        </td>
                        <td>
                            <a href="{{ url('/album/' . $album->id_album . '/edit') }}"
                                class="btn btn-primary my-1">Editar</a>
                            <form action="{{ url('/album/' . $album->id_album) }}" method="post">
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
