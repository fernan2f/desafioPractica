<h1>{{ $modo }} genero</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>

@endif

<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    @if($modo === 'Editar')
    <input type="text" class="form-control bg-white" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{ isset($generos->nombre)?$generos->nombre:'' }}">
    @else
    <input type="text" class="form-control bg-white" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{ isset($generos->nombre)?$generos->nombre:'' }}">
    @endif


</div>
<input type="submit" value="{{$modo}} datos" class="btn btn-success">
<a href="{{ url('genero')}}" class="btn btn-secondary">Regresar</a>