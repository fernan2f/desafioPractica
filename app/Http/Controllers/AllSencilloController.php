<?php

namespace App\Http\Controllers;

use App\Models\allSencillo;
use App\Models\sencillo;
use App\Models\album;
use Illuminate\Http\Request;

class AllSencilloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sencillos = sencillo::all();
        $albumes = album::all();

        return view('allSencillo', compact('sencillos', 'albumes'));
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
     * @param  \App\Models\allSencillo  $allSencillo
     * @return \Illuminate\Http\Response
     */
    public function show(allSencillo $allSencillo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\allSencillo  $allSencillo
     * @return \Illuminate\Http\Response
     */
    public function edit(allSencillo $allSencillo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\allSencillo  $allSencillo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, allSencillo $allSencillo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\allSencillo  $allSencillo
     * @return \Illuminate\Http\Response
     */
    public function destroy(allSencillo $allSencillo)
    {
        //
    }
}
