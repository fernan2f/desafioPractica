@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('album/create') }}" class="btn btn-secondary">Agregar un nuevo álbum</a>

    @if(Session::has('mensaje'))
    {{ Session::get('mensaje')}}
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Duracion</th>
                <th>Fecha</th>
                <th>Artista</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albumes as $album)
            <tr>
                <td>{{ $album->id_album }}</td>
                <td>{{ $album->nombre }}</td>
                <td>{{ $album->cantidad }}</td>

                <td>{{$album->duracion/60}}</td>
                <td>{{ $album->fecha }}</td>
                <td>{{ $album->artista }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$album->imagen }}" alt="" width="100">

                </td>
                <td>
                    <a href="{{ url('/album/'.$album->id_album.'/edit') }}" class="btn btn-primary my-1">Editar</a>
                    <form action="{{ url('/album/'.$album->id_album) }}" method="post">
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