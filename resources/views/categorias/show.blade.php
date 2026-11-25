@extends('layouts.app', ['title' => $categoria->nome])

@section('content')
    <a href="{{ route('categorias.index') }}" class="text-sm font-semibold text-green-700 hover:text-green-900">← Voltar às categorias</a>

    <div class="mt-6">
        <h1 class="text-3xl font-bold text-green-950">{{ $categoria->nome }}</h1>
        <p class="mt-3 max-w-2xl text-gray-600">{{ $categoria->descricao }}</p>
    </div>

    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($categoria->plantas as $planta)
            <article class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-green-100">
                <img src="{{ $planta->imagem_url }}" alt="{{ $planta->nome }}" class="h-44 w-full object-cover">
                <div class="p-5">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $planta->nome }}</h2>
                    <p class="mt-2 text-sm text-gray-600">{{ $planta->descricao }}</p>
                    <a href="{{ route('plantas.show', $planta) }}" class="mt-4 inline-block text-sm font-semibold text-green-700 hover:text-green-900">
                        Ver detalhes →
                    </a>
                </div>
            </article>
        @empty
            <p class="text-gray-600">Esta categoria ainda não tem plantas.</p>
        @endforelse
    </div>
@endsection
