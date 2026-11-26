@extends('layouts.app', ['title' => 'Admin - Categorias'])

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-green-600">Administração</p>
            <h1 class="mt-2 text-3xl font-bold text-green-950">Gestão de categorias</h1>
        </div>
        <a href="{{ route('admin.categorias.create') }}" class="rounded-lg bg-green-700 px-5 py-2 font-semibold text-white hover:bg-green-800">Nova categoria</a>
    </div>

    <div class="overflow-x-auto rounded-xl bg-white shadow-sm ring-1 ring-green-100">
        <table class="w-full divide-y divide-green-100">
            <thead class="bg-green-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-green-700">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-green-700">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-green-700">Plantas</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-green-700">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-green-100">
                @forelse ($categorias as $categoria)
                    <tr class="hover:bg-green-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $categoria->nome }}</td>
                        <td class="px-6 py-4 text-gray-600 max-w-xs truncate">{{ $categoria->descricao }}</td>
                        <td class="px-6 py-4 text-gray-600 whitespace-nowrap">{{ $categoria->plantas_count }}</td>
                        <td class="px-6 py-4 align-middle whitespace-nowrap">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.categorias.edit', $categoria) }}"
                                   class="text-sm font-semibold text-green-700 hover:text-green-900">Editar</a>
                                <span class="text-sm font-semibold text-red-700 hover:text-red-900 cursor-default">Eliminar</span>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-600">
                            Ainda não existem categorias.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection