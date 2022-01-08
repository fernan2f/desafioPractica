<?php

namespace App\Http\Controllers;

use App\Models\sencillo;
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
        return view('sencillo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sencillo.create');
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
            'genero' => 'required|string|max:100',
            'imagen' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'imagen.required' => 'La imagen es requerida'
        ];

        $this->validate($request, $campos, $mensaje);
        $datosSencillo = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $datosSencillo['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Sencillo::insert($datosSencillo);
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
        return view('sencillo.edit', compact('sencillo'));
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
        $datosSencillo = request()->except('_token', '_method');
        if ($request->hasFile('imagen')) {
            $sencillo = Sencillo::findOrFail($id_sencillo);
            Storage::delete('public/.$sencillo->imagen');
            $datosSencillo['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Sencillo::where('id_sencillo', '=', $id_sencillo)->update($datosSencillo);

        $sencillo = Sencillo::findOrFail($id_sencillo);
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

        if (Storage::delete('public/' . $sencillo->imagen)) {
            sencillo::destroy($id_sencillo);
        }
        return redirect('sencillo')->with('mensaje', 'Sencillo eliminado correctamente.');
    }
}
