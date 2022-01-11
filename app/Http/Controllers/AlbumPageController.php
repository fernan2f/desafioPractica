<?php

namespace App\Http\Controllers;

use DB;
use App\Models\albumPage;
use App\Models\sencillo;
use App\Models\album;
use Illuminate\Http\Request;

class AlbumPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('albumPage');
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
     * @param  \App\Models\albumPage  $albumPage
     * @return \Illuminate\Http\Response
     */
    public function show($idAlbum)
    {
        $sencillos = sencillo::all();
        $albumes = album::all();
        DB::table('album')
            ->where('id_album', $idAlbum)
            ->increment('visitas', 1);
        return view('albumPage', compact('idAlbum', 'sencillos', 'albumes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\albumPage  $albumPage
     * @return \Illuminate\Http\Response
     */
    public function edit(albumPage $albumPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\albumPage  $albumPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, albumPage $albumPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\albumPage  $albumPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(albumPage $albumPage)
    {
        //
    }
}
