<div class="mb-3">
    <label for="" class="form-label">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->titulo)?$sencillo->titulo:'' }}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->fecha)?$sencillo->fecha:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Duración</label>
    <input type="text" class="form-control" name="duracion" id="duracion" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->duracion)?$sencillo->duracion:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Artista</label>
    <input type="text" class="form-control" name="artista" id="artista" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->artista)?$sencillo->artista:'' }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Genero</label>
    <input type="text" class="form-control" name="genero" id="genero" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->genero)?$sencillo->artista:'' }}">
</div>

<div class=" mb-3">
    <label for="" class="form-label">Album</label>
    <input type="text" class="form-control" name="idAlbum" id="idAlbum" aria-describedby="helpId" placeholder="" value="{{ isset($sencillo->idAlbum)?$sencillo->idAlbum:'' }}">
</div>
@if(isset($empleado->foto))
<img src="{{ asset('storage').'/'.$sencillo->imagen }}" alt="" width="100">
@endif
<input type="file" name="imagen" id="imagen" value=""><br>
<input type="submit" value="Guardar datos">
<a href="{{ url('sencillo')}}">Regresar</a>