@extends('layouts.app', ['title' => 'Admin - Nova categoria'])

@section('content')
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-green-600">Administração</p>
        <h1 class="mt-2 text-3xl font-bold text-green-950">Nova categoria</h1>
    </div>

    <form method="POST" action="{{ route('admin.categorias.store') }}" class="max-w-2xl space-y-6">
        @csrf

        @if ($errors->any())
            <div class="rounded-lg bg-red-100 p-4 text-red-800">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <x-input-label for="nome" value="Nome" />
            <x-text-input id="nome" name="nome" type="text" :value="old('nome')" required autofocus
                          class="mt-1 w-full" minlength="2" maxlength="50" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            <p class="mt-1 text-sm text-gray-500">Mínimo 2 caracteres, máximo 50.</p>
        </div>

        <div>
            <x-input-label for="descricao" value="Descrição" />
            <textarea id="descricao" name="descricao" rows="4"
                      class="mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                      maxlength="500">{{ old('descricao') }}</textarea>
            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
            <p class="mt-1 text-sm text-gray-500">Opcional, máximo 500 caracteres.</p>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-green-100">
            <a href="{{ route('admin.categorias.index') }}"
               class="text-sm font-semibold text-green-700 hover:text-green-900">Cancelar</a>
            <x-primary-button>Guardar</x-primary-button>
        </div>
    </form>
@endsection