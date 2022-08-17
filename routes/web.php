<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\FontController;
use App\Http\Controllers\Admin\NombreController;
use App\Http\Controllers\Admin\GeneradoController;
use App\Http\Controllers\Admin\PlantillaController;


Route::view('/terminos', 'front.terminos');
Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::post('/parejas/ajaxbusca',[App\Http\Controllers\FrontController::class, 'ajaxbusca']);

Auth::routes();

Route::group(['prefix' => 'admin', 	'middleware' => ['auth']], function() {   
    Route::resource('nombre', NombreController::class);     
    Route::resource('plantilla', PlantillaController::class);     
    Route::post('/plantilla/limite',[App\Http\Controllers\Admin\PlantillaController::class, "limite"]);

    Route::resource('tag', TagController::class);
    Route::resource('font', FontController::class);
    Route::resource('generado', GeneradoController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{pareja}', [App\Http\Controllers\FrontController::class, 'pareja']);
Route::get('/{pareja}/{plantilla:slug}', [App\Http\Controllers\FrontController::class, 'plantilla']);
