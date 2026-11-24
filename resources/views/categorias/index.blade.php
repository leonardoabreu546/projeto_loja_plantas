@extends('layouts.app', ['title' => 'Categorias'])

@section('content')
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-green-600">Organização</p>
        <h1 class="mt-2 text-3xl font-bold text-green-950">Categorias de plantas</h1>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        @forelse ($categorias as $categoria)
            <article class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-green-100">
                <h2 class="text-xl font-semibold text-gray-900">{{ $categoria->nome }}</h2>
                <p class="mt-3 text-gray-600">{{ $categoria->descricao }}</p>
                <p class="mt-5 text-sm font-medium text-green-700">
                    {{ $categoria->plantas_count }} {{ $categoria->plantas_count === 1 ? 'planta' : 'plantas' }}
                </p>
            </article>
        @empty
            <p class="text-gray-600">Ainda não existem categorias disponíveis.</p>
        @endforelse
    </div>
@endsection
