<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PlantaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlantaController::class, 'index'])->name('plantas.index');
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
