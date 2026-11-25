@extends('layouts.app', ['title' => 'Contacto'])

@section('content')
    <div class="max-w-3xl">
        <p class="text-sm font-semibold uppercase tracking-wide text-green-600">Fale connosco</p>
        <h1 class="mt-2 text-3xl font-bold text-green-950">Contacto</h1>
        <p class="mt-3 text-gray-600">
            Estamos disponíveis para ajudar a escolher a planta certa para a sua casa.
        </p>
    </div>

    <div class="mt-8 grid gap-6 md:grid-cols-2">
        <section class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-green-100">
            <h2 class="text-xl font-semibold text-gray-900">Informações</h2>
            <dl class="mt-5 space-y-4 text-gray-600">
                <div>
                    <dt class="font-medium text-gray-900">Email</dt>
                    <dd>geral@lojadeplantas.pt</dd>
                </div>
                <div>
                    <dt class="font-medium text-gray-900">Telefone</dt>
                    <dd>291 000 000</dd>
                </div>
                <div>
                    <dt class="font-medium text-gray-900">Morada</dt>
                    <dd>Rua das Plantas, 12, Funchal</dd>
                </div>
            </dl>
        </section>

        <section class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-green-100">
            <h2 class="text-xl font-semibold text-gray-900">Horário</h2>
            <p class="mt-5 text-gray-600">Segunda a sexta-feira: 9:00–18:00</p>
            <p class="mt-2 text-gray-600">Sábado: 9:00–13:00</p>
            <p class="mt-2 text-gray-600">Domingo: encerrado</p>
        </section>
    </div>
@endsection
