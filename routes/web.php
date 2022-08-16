<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\FontController;
use App\Http\Controllers\Admin\NombreController;
use App\Http\Controllers\Admin\GeneradoController;
use App\Http\Controllers\Admin\PlantillaController;


Route::view('/terminos', 'front.terminos');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 	'middleware' => ['auth']], function() {   
    Route::resource('nombre', NombreController::class);     
    Route::resource('plantilla', PlantillaController::class);     
    Route::resource('tag', TagController::class);
    Route::resource('font', FontController::class);
    Route::resource('generado', GeneradoController::class);
});
