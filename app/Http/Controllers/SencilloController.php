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
        $datos['sencillos'] = Sencillo::all();
        $albumes = album::all();
        return view('sencillo.index', $datos);
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
        $datosSencillo = request()->except('_token', 'genero');
        $generoSencillo = request();
        $artistaSencillo = request();
        if ($request->hasFile('imagen')) {
            $datosSencillo['imagen'] = $request->file('imagen')->store('uploads', 'public');
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
        DB::table('sencillo_genero')->insert([
            'nombreGenero' => $generoSencillo['genero'],
            'idSencillo' => $lastIndex
        ]);
        DB::table('artista_sencillo')->insert([
            'nombreArtista' => $artistaSencillo['artista'],
            'idSencillo' => $lastIndex
        ]);




        // return response()->json($datosSencillo);
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
        return view('sencillo.edit', compact('sencillo', 'albumes', 'artistas', 'generos'));
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
        $datosSencillo = request()->except('_token', '_method', 'genero');
        $generoSencillo = request();
        $artistaSencillo = request();



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

        // if ($request->hasFile('imagen')) {
        //     $sencillo = Sencillo::findOrFail($id_sencillo);
        //     Storage::delete('public/.$sencillo->imagen');
        //     $datosSencillo['imagen'] = $request->file('imagen')->store('uploads', 'public');
        // }
        // Sencillo::insert($datosSencillo);


        DB::table('album')
            ->where('id_album', $datosSencillo['idAlbum'])
            ->increment('duracion', $datosSencillo['duracion']);
        DB::table('album')
            ->where('id_album', $datosSencillo['idAlbum'])
            ->increment('cantidad', 1);

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
        DB::table('sencillo_genero')->insert([
            'nombreGenero' => $generoSencillo['genero'],
            'idSencillo' => $lastIndex
        ]);
        DB::table('artista_sencillo')->insert([
            'nombreArtista' => $artistaSencillo['artista'],
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
