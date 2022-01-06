<div class="mb-3">
    <label for="" class="form-label">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="" value="{{ $sencillo->titulo }}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="" value="{{ $sencillo->fecha }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Duración</label>
    <input type="text" class="form-control" name="duracion" id="duracion" aria-describedby="helpId" placeholder="" value="{{ $sencillo->duracion }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Artista</label>
    <input type="text" class="form-control" name="artista" id="artista" aria-describedby="helpId" placeholder="" value="{{ $sencillo->artista }}">
</div>
<div class=" mb-3">
    <label for="" class="form-label">Genero</label>
    <input type="text" class="form-control" name="genero" id="genero" aria-describedby="helpId" placeholder="" value="{{ $sencillo->genero }}">
</div>

<div class=" mb-3">
    <label for="" class="form-label">Album</label>
    <input type="text" class="form-control" name="idAlbum" id="idAlbum" aria-describedby="helpId" placeholder="" value="{{ $sencillo->idAlbum }}">
</div>
<img src="{{ asset('storage').'/'.$sencillo->imagen }}" alt="" width="100">

<input type="file" name="imagen" id="imagen" value=""><br>
<input type="submit">