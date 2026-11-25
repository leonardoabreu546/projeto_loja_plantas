@extends('layouts.app', ['title' => 'Plantas'])

@section('content')
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-green-600">Loja de Plantas</p>
        <h1 class="mt-2 text-3xl font-bold text-green-950">As nossas plantas</h1>
        <p class="mt-2 text-gray-600">Escolha uma planta para trazer mais vida ao seu espaço.</p>
    </div>

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
