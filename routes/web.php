<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/home2', function () {
    return view('home2');
})->middleware('auth');
//Ruta para mostrar la vista show.blade.php
Route::get('/products/show', [ProductController::class, 'index'])->middleware('auth');

//Ruta para crear la vista create.blade.php
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

//Ruta para editar la vista create.blade.php
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->middleware('auth');

//Ruta para insertar producto
Route::post('/products/store', [ProductController::class, 'store']);

//Ruta para modificar producto
Route::put('/products/update/{product}', [ProductController::class, 'update']);

//Ruta para eliminar producto
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy']);

//Ruta para mostrar la vista show.blade.php
Route::get('/cliente/show', [ClienteController::class, 'index']);

//Ruta para crear la vista create.blade.php
Route::get('/cliente/create', [ClienteController::class, 'create']);

//Ruta para editar la vista create.blade.php
Route::get('/cliente/edit/{cliente}', [ClienteController::class, 'edit']);

//Ruta para insertar cliente
Route::post('/cliente/store', [ClienteController::class, 'store']);

//Ruta para modificar cliente
Route::put('/cliente/update/{cliente}', [ClienteController::class, 'update']);

//Ruta para eliminar cliente
Route::delete('/cliente/destroy/{id}', [ClienteController::class, 'destroy']);


//Ruta para mostrar la vista show.blade.php
Route::get('/categoria/show', [CategoriaController::class, 'index']);

//Ruta para crear la vista create.blade.php
Route::get('/categoria/create', [CategoriaController::class, 'create']);

//Ruta para editar la vista create.blade.php
Route::get('/categoria/edit/{categoria}', [CategoriaController::class, 'edit']);

//Ruta para insertar producto
Route::post('/categoria/store', [CategoriaController::class, 'store']);

//Ruta para modificar producto
Route::put('/categoria/update/{categoria}', [CategoriaController::class, 'update']);

//Ruta para eliminar producto
Route::delete('/categoria/destroy/{id}', [CategoriaController::class, 'destroy']);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
