<?php

namespace App\Http\Controllers;

use App\Models\artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['artistas'] = Artista::all();
        return view('artista.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artista.create');
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
            'fecha_nac' => 'required|date',
            'descripcion' => 'required|string|max:400',
            'imagen' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'imagen.required' => 'La imagen es requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosArtista = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $datosArtista['imagen'] = base64_encode(file_get_contents($request->file('imagen')));
        }
        Artista::insert($datosArtista);
        return redirect('artista')->with('mensaje', 'Artista agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show(artista $artista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit($nombre)
    {
        $artista = Artista::findOrFail($nombre);
        return view('artista.edit', compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nombre)
    {
        $datosArtista = request()->except('_token', '_method');
        if ($request->hasFile('imagen')) {
            $datosArtista['imagen'] = base64_encode(file_get_contents($request->file('imagen')));
        }
        artista::where('nombre', '=', $nombre)->update($datosArtista);

        $artista = artista::findOrFail($nombre);
        // return view('artista.edit', compact('artista'));
        return redirect('artista')->with('mensaje', 'artista editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy($nombre)
    {


        artista::destroy($nombre);

        // artista::destroy($nombre);

        return redirect('artista')->with('mensaje', 'Artista eliminado correctamente.');
    }
}
