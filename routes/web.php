<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlantaController::class, 'index'])->name('plantas.index');
Route::get('/plantas/{planta}', [PlantaController::class, 'show'])->name('plantas.show');
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::view('/contacto', 'contacto')->name('contacto');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/categorias', [CategoriaController::class, 'adminIndex'])->name('categorias.index');
    Route::get('/categorias/criar', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/plantas', [PlantaController::class, 'adminIndex'])->name('plantas.index');
});

require __DIR__.'/auth.php';
