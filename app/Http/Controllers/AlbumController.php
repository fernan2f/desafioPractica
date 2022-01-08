<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\artista;
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
        $datos['albumes'] = album::all();

        return view('album.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistas = Artista::all();
        return view('album.create', compact('artistas'));
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
            'genero' => 'required|string|max:400',
            'imagen' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'imagen.required' => 'La imagen es requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosAlbum = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $datosAlbum['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Album::insert($datosAlbum);
        return redirect('album')->with('mensaje', 'Sencillo agregado correctamente.');
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
        return view('album.edit', compact('album', 'artistas'));
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
        $datosAlbum = request()->except('_token', '_method');
        if ($request->hasFile('imagen')) {
            $album = album::findOrFail($id_album);
            Storage::delete('public/.$album->imagen');
            $datosAlbum['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        album::where('id_album', '=', $id_album)->update($datosAlbum);

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
        return redirect('album')->with('mensaje', 'album eliminado correctamente.');
    }
}
