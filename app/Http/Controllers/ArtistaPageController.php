<?php

namespace App\Http\Controllers;

use DB;
use App\Models\artistaPage;
use App\Models\sencillo;
use App\Models\album;
use App\Models\artista;
use Illuminate\Http\Request;

class ArtistaPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artistaPage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artistaPage  $artistaPage
     * @return \Illuminate\Http\Response
     */
    public function show($nombreArtista)
    {
        $sencillos = sencillo::all();
        $albumes = album::all();
        $artistas = artista::all();

        DB::table('artista')
            ->where('nombre', $nombreArtista)
            ->increment('oyentes', 1);

        return view('artistaPage', compact('sencillos', 'nombreArtista', 'albumes', 'artistas'));

        // return response()->json($nombreArtista);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artistaPage  $artistaPage
     * @return \Illuminate\Http\Response
     */
    public function edit(artistaPage $artistaPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artistaPage  $artistaPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artistaPage $artistaPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artistaPage  $artistaPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(artistaPage $artistaPage)
    {
        //
    }
}
