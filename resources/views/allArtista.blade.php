@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mb-5">Artistas</h1>
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Artista</th>
                    <th>Descripción</th>
                    <th>Oyentes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artistas as $artista)
                    <tr>
                        <td> <img class="shadow" style="width:100px"
                                src="data:image/jpeg;base64,{{ $artista['imagen'] }}"></td>
                        <td><a href="{{ url('/artistaPage/' . $artista->nombre) }}">{{ $artista['nombre'] }}</a></td>
                        <td>{{ $artista['descripcion'] }}</td>
                        <td>{{ $artista['oyentes'] }}</td>
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
