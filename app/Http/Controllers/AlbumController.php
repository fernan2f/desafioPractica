<?php

namespace App\Http\Controllers;

use DB;
use App\Models\album;
use App\Models\artista;
use App\Models\sencillo;
use App\Models\genero;
use App\Models\album_genero;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumes = album::all();
        $sencillos = sencillo::all();
        return view('album.index', compact('albumes', 'sencillos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistas = Artista::all();
        $generos = genero::all();
        return view('album.create', compact('artistas', 'generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'fecha' => 'required|date',
            'imagen' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'imagen.required' => 'La imagen es requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosAlbum = request()->except('_token', 'genero', 'select_question');
        $generoSencillo = request();
        $artistaSencillo = request();
        $aux = $generoSencillo->select_question;
        $array = [];
        $contador = 0;
        foreach ($aux as $auxiliar) {
            $array[$contador] = $auxiliar;
            $contador++;
        }

        if ($request->hasFile('imagen')) {
            $datosAlbum['imagen'] = base64_encode(file_get_contents($request->file('imagen')));
        }

        Album::insert($datosAlbum);
        $ultimoIndex = DB::getPdo()->lastInsertId();
        // $idGenero = Genero::select('id_genero')->where('nombre', $generoSencillo['genero'])->get();

        for ($i = 0; $i < sizeof($array); $i++) {
            $idGenero = genero::select('id_genero')->where('nombre', $array[$i])->get();
            DB::table('album_genero')->insert([
                'idGenero' => $idGenero[0]['id_genero'],
                'idAlbum' => $ultimoIndex
            ]);
        }
        // DB::table('album_genero')->insert([
        //     'idGenero' => $idGenero[0]['id_genero'],
        //     'idAlbum' => $ultimoIndex
        // ]);
        $idArtista = Artista::select('id_artista')->where('nombre', $artistaSencillo['artista'])->get();
        DB::table('artista_album')->insert([
            'idArtista' => $idArtista[0]['id_artista'],
            'idAlbum' => $ultimoIndex
        ]);
        return redirect('album')->with('mensaje', 'Album agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id_album)
    {
        $album = album::findOrFail($id_album);
        $artistas = Artista::all();
        $generos = genero::all();
        $album_generos = album_genero::all();
        $generosRelacion = [];
        $i = 0;
        foreach ($album_generos as $album_genero) {
            if ($album_genero['idAlbum'] == $id_album) {
                $generosRelacion[$i] = $album_genero->idGenero;
                $i++;
            }
        }

        return view('album.edit', compact('album', 'artistas', 'generos', 'generosRelacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_album)
    {
        $datosAlbum = request()->except('_token', '_method', 'select_question');
        $generoSencillo = request();
        $artistaSencillo = request();
        $aux = $generoSencillo->select_question;
        $array = [];
        $contador = 0;
        foreach ($aux as $auxiliar) {
            $array[$contador] = $auxiliar;
            $contador++;
        }

        $campos = [
            'nombre' => 'required|string|max:100',
            'fecha' => 'required|date',
            'duracion' => 'required|integer|max:10000',
            'artista' => 'required|string|max:100',
            'imagen' => 'required|max:10000|mimes:jpeg,png,jpg'


        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'imagen.required' => 'La imagen es requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        if ($request->hasFile('imagen')) {
            $datosAlbum['imagen'] = base64_encode(file_get_contents($request->file('imagen')));
        }
        album::destroy($id_album);
        album_genero::destroy($id_album);


        DB::table('album')->insert([
            'id_album' => $id_album,
            'nombre' => $datosAlbum['nombre'],
            'cantidad' => $datosAlbum['cantidad'],
            'duracion' => $datosAlbum['duracion'],
            'fecha' => $datosAlbum['fecha'],
            'artista' => $datosAlbum['artista'],
            'imagen' => $datosAlbum['imagen']
        ]);
        $ultimoIndex = DB::getPdo()->lastInsertId();


        for ($i = 0; $i < sizeof($array); $i++) {
            $idGenero = genero::select('id_genero')->where('nombre', $array[$i])->get();
            DB::table('album_genero')->insert([
                'idGenero' => $idGenero[0]['id_genero'],
                'idAlbum' => $ultimoIndex
            ]);
        }

        $idArtista = Artista::select('id_artista')->where('nombre', $artistaSencillo['artista'])->get();
        DB::table('artista_album')->insert([
            'idArtista' => $idArtista[0]['id_artista'],
            'idAlbum' => $ultimoIndex
        ]);
        // album::where('id_album', '=', $id_album)->update($datosAlbum);

        $album = album::findOrFail($id_album);
        // return view('album.edit', compact('album'));
        return redirect('album')->with('mensaje', 'album editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_album)
    {
        $album = album::findOrFail($id_album);

        if (Storage::delete('public/' . $album->imagen)) {
            album::destroy($id_album);
        }
        // album_genero::destroy($id_album);

        return redirect('album')->with('mensaje', 'album eliminado correctamente.');
    }
}
