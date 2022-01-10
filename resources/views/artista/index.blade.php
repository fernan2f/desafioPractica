@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container">
        <a href="{{ url('artista/create') }}" class="btn btn-secondary mb-5">Agregar un nuevo artista</a>

        @if (Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de Nac</th>
                    <th>Descripcion</th>
                    <th>Oyentes</th>
                    <th>Seguidores</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artistas as $artista)
                    <tr>
                        <td>{{ $artista->nombre }}</td>
                        <td>{{ $artista->fecha_nac }}</td>
                        <td>{{ $artista->descripcion }}</td>
                        <td>{{ $artista->oyentes }}</td>
                        <td>{{ $artista->seguidores }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $artista->imagen }}" alt="" width="100">

                        </td>
                        <td>
                            <a href="{{ url('/artista/' . $artista->nombre . '/edit') }}"
                                class="btn btn-primary my-1">Editar</a>
                            <form action="{{ url('/artista/' . $artista->nombre) }}" method="post">
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
