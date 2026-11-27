<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Planta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
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
        $destaque = Planta::inRandomOrder()->first();

        return view('plantas.index', compact('plantas', 'categorias', 'ordenacaoSelecionada', 'destaque'));
    }

    public function show(Planta $planta): View
    {
        $planta->load('categoria');
        $destaque = Planta::inRandomOrder()->first();

        return view('plantas.show', compact('planta', 'destaque'));
    }

    public function adminIndex(): View
    {
        $plantas = Planta::with('categoria')
            ->orderBy('nome')
            ->get();

        return view('admin.plantas.index', compact('plantas'));
    }

    public function create(): View
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('admin.plantas.create', compact('categorias'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validado = $request->validate([
            'categoria_id' => ['required', 'exists:categorias,id'],
            'nome' => ['required', 'string', 'min:2', 'max:100'],
            'nome_cientifico' => ['required', 'string', 'min:2', 'max:100'],
            'descricao' => ['nullable', 'string', 'max:1000'],
            'preco' => ['required', 'numeric', 'min:0', 'max:9999.99'],
            'stock' => ['required', 'integer', 'min:0', 'max:9999'],
            'imagem_url' => ['required', 'url', 'max:255'],
        ]);

        Planta::create($validado);

        return redirect()->route('admin.plantas.index')
            ->with('criada', 'Planta criada com sucesso.');
    }

    public function edit(Planta $planta): View
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('admin.plantas.edit', compact('planta', 'categorias'));
    }

    public function update(Request $request, Planta $planta): RedirectResponse
    {
        $validado = $request->validate([
            'categoria_id' => ['required', 'exists:categorias,id'],
            'nome' => ['required', 'string', 'min:2', 'max:100'],
            'nome_cientifico' => ['required', 'string', 'min:2', 'max:100'],
            'descricao' => ['nullable', 'string', 'max:1000'],
            'preco' => ['required', 'numeric', 'min:0', 'max:9999.99'],
            'stock' => ['required', 'integer', 'min:0', 'max:9999'],
            'imagem_url' => ['required', 'url', 'max:255'],
        ]);

        $planta->update($validado);

        return redirect()->route('admin.plantas.index')
            ->with('atualizada', 'Planta atualizada com sucesso.');
    }

    public function destroy(Planta $planta): RedirectResponse
    {
        $planta->delete();

        return redirect()->route('admin.plantas.index')
            ->with('eliminada', 'Planta eliminada com sucesso.');
    }
}
