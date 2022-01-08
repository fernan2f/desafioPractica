<h1>{{ $modo }} sencillo</h1>

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
    <label for="" class="form-label">Titulo</label>
    <input type="text" class="form-control bg-white" name="titulo" id="titulo" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->titulo)?$sencillo->titulo:'' }}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input type="date" class="form-control bg-white " name="fecha" id="fecha" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->fecha)?$sencillo->fecha:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Duración</label>
    <input type="text" class="form-control bg-white" name="duracion" id="duracion" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->duracion)?$sencillo->duracion:'' }}">
</div>



@if(isset($sencillo->imagen))
<img src="{{ asset('storage').'/'.$sencillo->imagen }}" alt="" width="200" class="my-5">
@endif
<input type="file" name="imagen" id="imagen" value="" class="btn btn-primary my-2"><br>
<input type="submit" value="{{$modo}} datos" class="btn btn-success">
<a href="{{ url('sencillo')}}" class="btn btn-secondary">Regresar</a>