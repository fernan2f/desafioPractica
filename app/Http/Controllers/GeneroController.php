<?php

namespace App\Http\Controllers;

use App\Models\genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = genero::all();
        return view('genero.index', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = genero::all();
        return view('genero.create', compact('generos'));
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
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosGenero = request()->except('_token');
        genero::insert($datosGenero);
        return redirect('genero')->with('mensaje', 'genero agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($nombre)
    {
        $generos = genero::findOrFail($nombre);

        return view('genero.edit', compact('generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nombre)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy($nombre)
    {
        genero::destroy($nombre);
        // genero::destroy($nombre);

        return redirect('genero')->with('mensaje', 'genero eliminado correctamente.');
    }
}
