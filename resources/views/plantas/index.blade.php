@extends('layouts.app', ['title' => 'Plantas'])

@section('content')
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-green-600">Loja de Plantas</p>
        <h1 class="mt-2 text-3xl font-bold text-green-950">As nossas plantas</h1>
        <p class="mt-2 text-gray-600">Escolha uma planta para trazer mais vida ao seu espaço.</p>
    </div>

    <form method="GET" action="{{ route('plantas.index') }}" class="mb-8 grid gap-4 rounded-xl bg-white p-5 shadow-sm ring-1 ring-green-100 md:grid-cols-4">
        <div class="md:col-span-2">
            <label for="pesquisa" class="text-sm font-medium text-gray-700">Pesquisar</label>
            <input id="pesquisa" name="pesquisa" type="search" value="{{ request('pesquisa') }}" placeholder="Nome da planta..." class="mt-1 w-full rounded-lg border-gray-300">
        </div>

        <div>
            <label for="categoria_id" class="text-sm font-medium text-gray-700">Categoria</label>
            <select id="categoria_id" name="categoria_id" class="mt-1 w-full rounded-lg border-gray-300">
                <option value="">Todas</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected((string) request('categoria_id') === (string) $categoria->id)>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="ordenar" class="text-sm font-medium text-gray-700">Ordenar</label>
            <select id="ordenar" name="ordenar" class="mt-1 w-full rounded-lg border-gray-300">
                <option value="nome_asc" @selected($ordenacaoSelecionada === 'nome_asc')>Nome A-Z</option>
                <option value="nome_desc" @selected($ordenacaoSelecionada === 'nome_desc')>Nome Z-A</option>
                <option value="preco_asc" @selected($ordenacaoSelecionada === 'preco_asc')>Preço menor</option>
                <option value="preco_desc" @selected($ordenacaoSelecionada === 'preco_desc')>Preço maior</option>
            </select>
        </div>

        <div class="md:col-span-4">
            <button type="submit" class="rounded-lg bg-green-700 px-5 py-2 font-semibold text-white hover:bg-green-800">
                Aplicar filtros
            </button>
            <a href="{{ route('plantas.index') }}" class="ml-3 text-sm font-semibold text-green-700 hover:text-green-900">Limpar</a>
        </div>
    </form>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @forelse ($plantas as $planta)
            <article class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-green-100">
                <img src="{{ $planta->imagem_url }}" alt="{{ $planta->nome }}" class="h-44 w-full object-cover">
                <div class="p-5">
                    <p class="text-xs font-semibold uppercase tracking-wide text-green-600">{{ $planta->categoria->nome }}</p>
                    <h2 class="mt-2 text-lg font-semibold text-gray-900">{{ $planta->nome }}</h2>
                    <p class="mt-2 text-sm text-gray-600">{{ $planta->descricao }}</p>
                    <p class="mt-4 font-bold text-green-800">{{ number_format((float) $planta->preco, 2, ',', '.') }} €</p>
                    <a href="{{ route('plantas.show', $planta) }}" class="mt-4 inline-block text-sm font-semibold text-green-700 hover:text-green-900">
                        Ver detalhes →
                    </a>
                </div>
            </article>
        @empty
            <p class="text-gray-600">Ainda não existem plantas disponíveis.</p>
        @endforelse
    </div>
@endsection
