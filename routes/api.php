<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Nueva ruta para verificar el email
Route::get('/login/{email}', [UsuarioController::class, 'verificaemail']);

// Nueva ruta para verificar la clave
Route::post('/login/{email}/{clave}', [UsuarioController::class, 'verificaclave']);
Route::post('/register', [UsuarioController::class, 'registrar']);

Route::resource('/categoria', CategoriaController::class);
Route::resource('/producto', ProductoController::class);
Route::resource('/cliente', ClienteController::class);
