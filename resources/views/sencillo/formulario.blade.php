<h1>{{ $modo }} sencillo</h1>

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>

@endif

<div class="mb-3">
    <label for="" class="form-label">Titulo</label>
    <input type="text" class="form-control bg-white" name="titulo" required id="titulo" aria-describedby="helpId"
        placeholder="" value="{{ isset($sencillo->titulo) ? $sencillo->titulo : old('titulo') }}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input type="date" class="form-control bg-white " name="fecha" required id="fecha" aria-describedby="helpId"
        placeholder="" value="{{ isset($sencillo->fecha) ? $sencillo->fecha : old('fecha') }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Duración (segundos) </label>
    <input type="text" class="form-control bg-white" name="duracion" required id="duracion" aria-describedby="helpId"
        placeholder="" value="{{ isset($sencillo->duracion) ? $sencillo->duracion : old('duracion') }}">
</div>




@if (isset($sencillo->imagen))
    <img class="shadow" style="width:100px" src="data:image/jpeg;base64,{{ $sencillo['imagen'] }}">
@endif
<label for="" class="form-label">Imagen: </label><br>
<input type="file" name="imagen" id="imagen" value="" class="btn btn-primary my-2"><br>
<label for="" class="form-label">Canción: </label><br>
<input type="file" name="audio" id="audio" value="" class="btn btn-primary my-2"><br>
<input type="submit" value="{{ $modo }} datos" class="btn btn-success">
<a href="{{ url('sencillo') }}" class="btn btn-secondary">Regresar</a>
