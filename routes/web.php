<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PlantaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlantaController::class, 'index'])->name('plantas.index');
Route::get('/plantas/{planta}', [PlantaController::class, 'show'])->name('plantas.show');
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
