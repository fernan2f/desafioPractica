<?php

namespace App\Http\Controllers;

use App\Models\landingPage;
use App\Models\sencillo;
use App\Models\sencillo_genero;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sencillos = sencillo::all();
        $sencillo_generos = sencillo_genero::all();

        return view('LandingPage', compact('sencillos', 'sencillo_generos'));
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
     * @param  \App\Models\landingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function show(landingPage $landingPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\landingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function edit(landingPage $landingPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\landingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, landingPage $landingPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\landingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(landingPage $landingPage)
    {
        //
    }
}
