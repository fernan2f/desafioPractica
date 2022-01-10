@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('genero/create') }}" class="btn btn-secondary">Agregar un nuevo género</a>

        @if (Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <table class="table mb-5">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($generos as $genero)
                    <tr>
                        <td>{{ $genero->nombre }}</td>
                        <td>
                            <form action="{{ url('/genero/' . $genero->nombre) }}" method="post">
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
