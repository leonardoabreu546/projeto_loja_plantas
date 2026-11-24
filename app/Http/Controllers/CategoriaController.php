<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(): View
    {
        $categorias = Categoria::withCount('plantas')
            ->orderBy('nome')
            ->get();

        return view('categorias.index', compact('categorias'));
    }
}
