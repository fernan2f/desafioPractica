<?php

namespace App\Http\Controllers;

use DB;
use App\Models\sencillo;
use App\Models\album;
use App\Models\artista;
use App\Models\genero;
use App\Models\sencillo_genero;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SencilloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sencillos = Sencillo::all();
        $albumes = album::all();
        return view('sencillo.index', compact('sencillos', 'albumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $albumes = album::all();
        $artistas = artista::all();
        $generos = genero::all();

        return view('sencillo.create', compact('albumes', 'artistas', 'generos'));
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
            'titulo' => 'required|string|max:100',
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
        $generoSencillo = request();



        $datosSencillo = request()->except('_token', 'genero', 'select_question');
        $aux = $generoSencillo->select_question;
        $array = [];
        $contador = 0;
        if ($aux == '') {
            return redirect('sencillo/create');
        }

        foreach ($aux as $auxiliar) {
            $array[$contador] = $auxiliar;
            $contador++;
        }
        // return response()->json();


        $artistaSencillo = request()->all();
        if ($request->hasFile('imagen')) {
            $datosSencillo['imagen'] = base64_encode(file_get_contents($request->file('imagen')));
        }

        // $albumcito = DB::table('album')->increment('duracion', 1500)->where('id_album', $datosSencillo['idAlbum']);
        $albumcito =
            DB::table('album')
            ->where('id_album', $datosSencillo['idAlbum'])
            ->increment('duracion', $datosSencillo['duracion']);
        DB::table('album')
            ->where('id_album', $datosSencillo['idAlbum'])
            ->increment('cantidad', 1);

        Sencillo::insert($datosSencillo);

        $lastIndex = DB::getPdo()->lastInsertId();
        for ($i = 0; $i < sizeof($array); $i++) {
            $idGenero = genero::select('id_genero')->where('nombre', $array[$i])->get();
            DB::table('sencillo_genero')->insert([
                'idGenero' => $idGenero[0]['id_genero'],
                'idSencillo' => $lastIndex
            ]);
        }

        $idArtista = artista::select('id_artista')->where('nombre', $artistaSencillo['artista'])->get();
        DB::table('artista_sencillo')->insert([
            'idArtista' => $idArtista[0]['id_artista'],
            'idSencillo' => $lastIndex
        ]);





        // return response()->json($artistaSencillo);
        return redirect('sencillo')->with('mensaje', 'Sencillo agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sencillo  $sencillo
     * @return \Illuminate\Http\Response
     */
    public function show(sencillo $sencillo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sencillo  $sencillo
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sencillo)
    {
        $sencillo = Sencillo::findOrFail($id_sencillo);
        $albumes = album::all();
        $artistas = artista::all();
        $generos = genero::all();
        $sencillo_generos = sencillo_genero::all();
        $generosRelacion = [];

        $i = 0;
        foreach ($sencillo_generos as $sencillo_genero) {
            if ($sencillo_genero['idSencillo'] == $id_sencillo) {
                $generosRelacion[$i] = $sencillo_genero->idGenero;
                $i++;
            }
        }

        return view('sencillo.edit', compact('sencillo', 'albumes', 'artistas', 'generos', 'generosRelacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sencillo  $sencillo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sencillo)
    {
        $campos = [
            'titulo' => 'required|string|max:100',
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
        $datosSencillo = request()->except('_token', '_method', 'genero');
        $generoSencillo = request();
        $artistaSencillo = request();
        $aux = $generoSencillo->select_question;
        if ($aux == '') {
            return redirect('sencillo/' . $id_sencillo . '/edit');
        }
        $array = [];
        $contador = 0;
        foreach ($aux as $auxiliar) {
            $array[$contador] = $auxiliar;
            $contador++;
        }

        // Sencillo::where('id_sencillo', '=', $id_sencillo)->update($datosSencillo);
        $sencilloActual = Sencillo::findOrFail($id_sencillo);

        DB::table('album')
            ->where('id_album', $sencilloActual['idAlbum'])
            ->decrement('duracion', $sencilloActual['duracion']);

        DB::table('album')
            ->where('id_album', $sencilloActual['idAlbum'])
            ->decrement('cantidad', 1);
        sencillo::destroy($id_sencillo);
        sencillo_genero::destroy($id_sencillo);
        DB::table('album')
            ->where('id_album', $datosSencillo['idAlbum'])
            ->increment('duracion', $datosSencillo['duracion']);
        DB::table('album')
            ->where('id_album', $datosSencillo['idAlbum'])
            ->increment('cantidad', 1);


        if ($request->hasFile('imagen')) {
            $datosSencillo['imagen'] = base64_encode(file_get_contents($request->file('imagen')));
        }

        DB::table('sencillo')->insert([
            'id_sencillo' => $id_sencillo,
            'titulo' => $datosSencillo['titulo'],
            'fecha' => $datosSencillo['fecha'],
            'duracion' => $datosSencillo['duracion'],
            'artista' => $datosSencillo['artista'],
            'idAlbum' => $datosSencillo['idAlbum'],
            'imagen' => $datosSencillo['imagen']
        ]);
        $lastIndex = DB::getPdo()->lastInsertId();
        for ($i = 0; $i < sizeof($array); $i++) {
            $idGenero = genero::select('id_genero')->where('nombre', $array[$i])->get();
            DB::table('sencillo_genero')->insert([
                'idGenero' => $idGenero[0]['id_genero'],
                'idSencillo' => $lastIndex
            ]);
        }

        $idArtista = artista::select('id_artista')->where('nombre', $artistaSencillo['artista'])->get();
        DB::table('artista_sencillo')->insert([
            'idArtista' => $idArtista[0]['id_artista'],
            'idSencillo' => $lastIndex
        ]);

        // $sencillo = Sencillo::findOrFail($id_sencillo);
        // return view('sencillo.edit', compact('sencillo'));
        return redirect('sencillo')->with('mensaje', 'Sencillo editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sencillo  $sencillo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sencillo)
    {

        $sencillo = Sencillo::findOrFail($id_sencillo);

        // if (Storage::delete('public/' . $sencillo->imagen)) {
        sencillo::destroy($id_sencillo);
        // }

        DB::table('album')
            ->where('id_album', $sencillo['idAlbum'])
            ->decrement('duracion', $sencillo['duracion']);

        DB::table('album')
            ->where('id_album', $sencillo['idAlbum'])
            ->decrement('cantidad', 1);

        // sencillo_genero::destroy($id_sencillo);

        return redirect('sencillo')->with('mensaje', 'Sencillo eliminado correctamente.');
    }
}
