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
    <input type="text" class="form-control bg-white " name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{ isset($album->nombre)?$album->fecha:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input type="text" class="form-control bg-white" name="cantidad" id="cantidad" aria-describedby="helpId" placeholder="" value="{{ isset($album->cantidad)?$album->cantidad:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Duración</label>
    <input type="text" class="form-control bg-white" name="duracion" id="duracion" aria-describedby="helpId" placeholder="" value="{{ isset($album->duracion)?$album->duracion:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Fecha</label>
    <input type="date" class="form-control bg-white" name="fecha" id="fecha" aria-describedby="helpId" placeholder="" value="{{ isset($album->fecha)?$album->fecha:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Genero</label>
    <input type="text" class="form-control bg-white" name="genero" id="genero" aria-describedby="helpId" placeholder="" value="{{ isset($album->genero)?$album->genero:'' }}">
</div>
@if(isset($album->imagen))
<img src="{{ asset('storage').'/'.$album->imagen }}" alt="" width="200" class="my-5">
@endif
<input type="file" name="imagen" id="imagen" value="" class="btn btn-primary my-2"><br>
<input type="submit" value="{{$modo}} datos" class="btn btn-success">
<a href="{{ url('album')}}" class="btn btn-secondary">Regresar</a>