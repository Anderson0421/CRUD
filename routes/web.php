<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas del Login agrupadas por el controlador del LoginController

Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'login');  // Ruta Login - Muestra de formulario
});

// Hola a todos

//Hola SENATINO