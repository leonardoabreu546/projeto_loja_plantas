<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Planta;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(): View
    {
        $categorias = Categoria::withCount('plantas')
            ->orderBy('nome')
            ->get();
        $destaque = Planta::inRandomOrder()->first();

        return view('categorias.index', compact('categorias', 'destaque'));
    }

    public function show(Categoria $categoria): View
    {
        $categoria->load('plantas');
        $destaque = Planta::inRandomOrder()->first();

        return view('categorias.show', compact('categoria', 'destaque'));
    }

    public function adminIndex(): View
    {
        $categorias = Categoria::withCount('plantas')
            ->orderBy('nome')
            ->get();

        return view('admin.categorias.index', compact('categorias'));
    }
}
