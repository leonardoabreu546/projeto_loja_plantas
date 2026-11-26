@extends('layouts.app', ['title' => 'Admin - Nova planta'])

@section('content')
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-green-600">Administração</p>
        <h1 class="mt-2 text-3xl font-bold text-green-950">Nova planta</h1>
    </div>

    <form method="POST" action="{{ route('admin.plantas.store') }}" class="max-w-3xl space-y-6">
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

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <x-input-label for="categoria_id" value="Categoria" />
                <select id="categoria_id" name="categoria_id" required
                        class="mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="nome" value="Nome" />
                <x-text-input id="nome" name="nome" type="text" :value="old('nome')" required
                              class="mt-1 w-full" minlength="2" maxlength="100" />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-input-label for="nome_cientifico" value="Nome científico" />
            <x-text-input id="nome_cientifico" name="nome_cientifico" type="text" :value="old('nome_cientifico')" required
                          class="mt-1 w-full" minlength="2" maxlength="100" />
            <x-input-error :messages="$errors->get('nome_cientifico')" class="mt-2" />
            <p class="mt-1 text-sm text-gray-500">Ex: Monstera deliciosa</p>
        </div>

        <div>
            <x-input-label for="descricao" value="Descrição" />
            <textarea id="descricao" name="descricao" rows="4"
                      class="mt-1 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                      maxlength="1000">{{ old('descricao') }}</textarea>
            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
            <p class="mt-1 text-sm text-gray-500">Opcional, máximo 1000 caracteres.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            <div>
                <x-input-label for="preco" value="Preço (€)" />
                <x-text-input id="preco" name="preco" type="number" step="0.01" min="0" max="9999.99"
                              :value="old('preco')" required class="mt-1 w-full" />
                <x-input-error :messages="$errors->get('preco')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="stock" value="Stock" />
                <x-text-input id="stock" name="stock" type="number" min="0" max="9999"
                              :value="old('stock')" required class="mt-1 w-full" />
                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="imagem_url" value="URL da imagem" />
                <x-text-input id="imagem_url" name="imagem_url" type="url" :value="old('imagem_url')" required
                              class="mt-1 w-full" maxlength="255" placeholder="https://exemplo.com/imagem.jpg" />
                <x-input-error :messages="$errors->get('imagem_url')" class="mt-2" />
                <p class="mt-1 text-sm text-gray-500">URL válida, máximo 255 caracteres.</p>
            </div>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-green-100">
            <a href="{{ route('admin.plantas.index') }}"
               class="text-sm font-semibold text-green-700 hover:text-green-900">Cancelar</a>
            <x-primary-button>Guardar</x-primary-button>
        </div>
    </form>
@endsection