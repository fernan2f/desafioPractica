<h1>{{ $modo }} artista</h1>

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
    <input type="text" class="form-control bg-white" readonly name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{ isset($artista->nombre)?$artista->nombre:'' }}">
    @else
    <input type="text" class="form-control bg-white" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{ isset($artista->nombre)?$artista->nombre:'' }}">
    @endif


</div>
<div class="mb-3">
    <label for="" class="form-label">Fecha nac</label>
    <input type="date" class="form-control bg-white " name="fecha_nac" id="fecha_nac" aria-describedby="helpId" placeholder="" value="{{ isset($artista->fecha_nac)?$artista->fecha_nac:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Descripción</label>
    <input type="text" class="form-control bg-white" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="" value="{{ isset($artista->descripcion)?$artista->descripcion:'' }}">
</div>

@if(isset($artista->imagen))
<img src="{{ asset('storage').'/'.$artista->imagen }}" alt="" width="200" class="my-5">
@endif
<input type="file" name="imagen" id="imagen" value="" class="btn btn-primary my-2"><br>
<input type="submit" value="{{$modo}} datos" class="btn btn-success">
<a href="{{ url('artista')}}" class="btn btn-secondary">Regresar</a>