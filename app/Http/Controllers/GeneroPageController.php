<?php

namespace App\Http\Controllers;

use DB;
use App\Models\generoPage;
use App\Models\sencillo_genero;
use App\Models\sencillo;
use App\Models\genero;
use Illuminate\Http\Request;

class GeneroPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('generoPage');
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
     * @param  \App\Models\generoPage  $generoPage
     * @return \Illuminate\Http\Response
     */
    public function show($idGenero)
    {

        $array = array();
        $array2 = array();
        $nombreGenero = '';
        $sencillo_generos = sencillo_genero::all();
        $generos = genero::all();
        $sencillos = sencillo::all();
        $i = 0;
        foreach ($sencillo_generos as $datos) {
            if ($datos->idGenero == $idGenero) {
                $array[$i] = $datos->idSencillo;
                $i++;
            }
        }
        foreach ($generos as $genero) {
            if ($genero['id_genero'] == $idGenero) {
                $nombreGenero = $genero['nombre'];
            }
        }

        return view('generoPage', compact('array', 'sencillos', 'nombreGenero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\generoPage  $generoPage
     * @return \Illuminate\Http\Response
     */
    public function edit(generoPage $generoPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\generoPage  $generoPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, generoPage $generoPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\generoPage  $generoPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(generoPage $generoPage)
    {
        //
    }
}
