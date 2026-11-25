@extends('layouts.app', ['title' => $planta->nome])

@section('content')
    <a href="{{ route('plantas.index') }}" class="text-sm font-semibold text-green-700 hover:text-green-900">← Voltar às plantas</a>

    <article class="mt-6 grid gap-8 overflow-hidden rounded-xl bg-white p-6 shadow-sm ring-1 ring-green-100 md:grid-cols-2 md:p-8">
        <img src="{{ $planta->imagem_url }}" alt="{{ $planta->nome }}" class="h-full min-h-72 w-full rounded-lg object-cover">

        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-green-600">{{ $planta->categoria->nome }}</p>
            <h1 class="mt-2 text-3xl font-bold text-green-950">{{ $planta->nome }}</h1>
            <p class="mt-2 italic text-gray-500">{{ $planta->nome_cientifico }}</p>
            <p class="mt-6 leading-7 text-gray-700">{{ $planta->descricao }}</p>
            <p class="mt-6 text-2xl font-bold text-green-800">{{ number_format((float) $planta->preco, 2, ',', '.') }} €</p>
            <p class="mt-2 text-sm text-gray-600">Stock disponível: {{ $planta->stock }}</p>
        </div>
    </article>
@endsection
