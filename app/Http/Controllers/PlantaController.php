<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Planta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlantaController extends Controller
{
    public function index(Request $request): View
    {
        $ordenacoes = [
            'nome_asc' => ['nome', 'asc'],
            'nome_desc' => ['nome', 'desc'],
            'preco_asc' => ['preco', 'asc'],
            'preco_desc' => ['preco', 'desc'],
        ];

        $ordenacaoSelecionada = $request->string('ordenar')->toString();
        $ordenacao = $ordenacoes[$ordenacaoSelecionada] ?? $ordenacoes['nome_asc'];

        $plantas = Planta::with('categoria')
            ->when($request->filled('pesquisa'), function (Builder $query) use ($request): void {
                $pesquisa = $request->string('pesquisa')->toString();

                $query->where(function (Builder $query) use ($pesquisa): void {
                    $query->where('nome', 'like', "%{$pesquisa}%")
                        ->orWhere('nome_cientifico', 'like', "%{$pesquisa}%");
                });
            })
            ->when($request->filled('categoria_id'), function (Builder $query) use ($request): void {
                $query->where('categoria_id', $request->integer('categoria_id'));
            })
            ->orderBy($ordenacao[0], $ordenacao[1])
            ->get();

        $categorias = Categoria::orderBy('nome')->get();

        return view('plantas.index', compact('plantas', 'categorias', 'ordenacaoSelecionada'));
    }

    public function show(Planta $planta): View
    {
        $planta->load('categoria');

        return view('plantas.show', compact('planta'));
    }
}
