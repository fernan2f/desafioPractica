<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Reproducciones</th>
            <th>Duración</th>
            <th>Artista</th>
            <th>Genero</th>
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
            <td>{{ $sencillo->genero }}</td>
            <td>
                <img src="{{ asset('storage').'/'.$sencillo->imagen }}" alt="" width="100">
            </td>
            <td>
                <a href="{{url('/sencillo/'.$sencillo->id_sencillo.'/edit')}}">Editar</a>
                <form action="{{url('/sencillo/'.$sencillo->id_sencillo)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿ Seguro que deseas eliminar ?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>