<?php

namespace App\Http\Controllers;

use App\Models\allAlbum;
use App\Models\album;
use Illuminate\Http\Request;

class AllAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumes = album::all();
        return view('allAlbum', compact('albumes'));
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
     * @param  \App\Models\allAlbum  $allAlbum
     * @return \Illuminate\Http\Response
     */
    public function show(allAlbum $allAlbum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\allAlbum  $allAlbum
     * @return \Illuminate\Http\Response
     */
    public function edit(allAlbum $allAlbum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\allAlbum  $allAlbum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, allAlbum $allAlbum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\allAlbum  $allAlbum
     * @return \Illuminate\Http\Response
     */
    public function destroy(allAlbum $allAlbum)
    {
        //
    }
}
