@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mb-5">Géneros</h1>
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre del género</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($generos as $genero)
                    <tr>
                        <td>
                            <hp class="card-title "><a
                                    href="{{ url('/generoPage/' . $genero->id_genero) }}">{{ $genero['nombre'] }}</a>
                            </hp>
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
