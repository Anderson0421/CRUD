<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\plataforma;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas del Login agrupadas por el controlador del LoginController

Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'login');  // Ruta Login - Muestra de formulario
});


Route::controller(plataforma::class)->group(function(){
    Route::get('/','List');
    Route::get('/{id}/Edit','Edit');
    Route::put('/{id}/Edit','Update')->name('update');
});

