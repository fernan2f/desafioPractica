<?php

namespace App\Http\Controllers;

use App\Models\allGenero;
use App\Models\genero;
use Illuminate\Http\Request;

class AllGeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = genero::all();
        return view('allGenero', compact('generos'));
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
     * @param  \App\Models\allGenero  $allGenero
     * @return \Illuminate\Http\Response
     */
    public function show(allGenero $allGenero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\allGenero  $allGenero
     * @return \Illuminate\Http\Response
     */
    public function edit(allGenero $allGenero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\allGenero  $allGenero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, allGenero $allGenero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\allGenero  $allGenero
     * @return \Illuminate\Http\Response
     */
    public function destroy(allGenero $allGenero)
    {
        //
    }
}
