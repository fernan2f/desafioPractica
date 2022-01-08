@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('artista/create')}}" class="btn btn-secondary">Agregar un nuevo artista</a>

    @if(Session::has('mensaje'))
    {{ Session::get('mensaje')}}
    @endif
    <table class="table">
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
            @foreach($artistas as $artista)
            <tr>
                <td>{{ $artista->nombre }}</td>
                <td>{{ $artista->fecha_nac }}</td>
                <td>{{ $artista->descripcion }}</td>
                <td>{{ $artista->oyentes }}</td>
                <td>{{ $artista->seguidores }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$artista->imagen }}" alt="" width="100">

                </td>
                <td>
                    <a href="{{ url('/artista/'.$artista->nombre.'/edit') }}" class="btn btn-primary my-1">Editar</a>
                    <form action="{{ url('/artista/'.$artista->nombre) }}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" onclick="return confirm('¿ Seguro que deseas eliminar ?')" value="Borrar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection