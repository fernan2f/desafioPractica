<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SencilloController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/sencillo', function () {
//     return view('sencillo.index');
// });

// Route::get('/sencillo/create', [SencilloController::class, 'create']);

Route::resource('sencillo', SencilloController::class);  //Crea todas las rutas automaticamente enlazandolas con las funciones que existen en el controlador
