<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SencilloController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\SencilloGeneroController;
use App\Http\Controllers\LandingPageController;

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
    return view('auth.login');
});

// Route::get('/sencillo', function () {
//     return view('sencillo.index');
// });

// Route::get('/sencillo/create', [SencilloController::class, 'create']);

Route::resource('sencillo', SencilloController::class);
Route::resource('artista', ArtistaController::class);
Route::resource('album', AlbumController::class);
Route::resource('genero', GeneroController::class);
Route::resource('sencillo_genero', SencilloGeneroController::class);
Route::resource('landingPage', LandingPageController::class);
//Crea todas las rutas automaticamente enlazandolas con las funciones que existen en el controlador
//el ->->middleware('auth') no te deja entrar a nada relacionado a esta ruta si no estás logeado antes
Auth::routes();

Route::get('/', [LandingPageController::class, 'index']);

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/', [SencilloController::class, 'index'])->name('home');
// });
