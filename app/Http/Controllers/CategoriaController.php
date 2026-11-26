<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Planta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function create(): View
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validado = $request->validate([
            'nome' => ['required', 'string', 'min:2', 'max:50', 'unique:categorias,nome'],
            'descricao' => ['nullable', 'string', 'max:500'],
        ]);

        Categoria::create($validado);

        return redirect()->route('admin.categorias.index')
            ->with('sucesso', 'Categoria criada com sucesso.');
    }
}
