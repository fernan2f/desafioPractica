@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('sencillo/create')}}" class="btn btn-secondary">Agregar un nuevo sencillo</a>

    @if(Session::has('mensaje'))
    {{ Session::get('mensaje')}}
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Reproducciones</th>
                <th>Duración</th>
                <th>Artista</th>
                <th>Album</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sencillos as $sencillo)
            <tr>
                <td>{{ $sencillo->id_sencillo }}</td>
                <td>{{ $sencillo->titulo }}</td>
                <td>{{ $sencillo->fecha }}</td>
                <td>{{ $sencillo->reproducciones }}</td>
                <td>{{ $sencillo->duracion }}</td>
                <td>{{ $sencillo->artista }}</td>
                <td>
                    @foreach($albumes as $album)
                    @if(($album->id_album) === ($sencillo->idAlbum))
                    {{$album['nombre']}}
                    @endif
                    @endforeach
                </td>
                <td>
                    <img src="{{ asset('storage').'/'.$sencillo->imagen }}" alt="" width="100">
                </td>
                <td>
                    <a href="{{ url('/sencillo/'.$sencillo->id_sencillo.'/edit') }}" class="btn btn-primary my-1">Editar</a>
                    <form action="{{url('/sencillo/'.$sencillo->id_sencillo)}}" method="post">
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