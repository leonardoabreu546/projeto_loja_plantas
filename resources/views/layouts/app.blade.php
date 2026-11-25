<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? config('app.name', 'Loja de Plantas') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-green-50 text-gray-800">
        @include('layouts.navigation')

        @if ($destaque ?? null)
            <aside class="border-b border-amber-200 bg-amber-50">
                <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-6 py-3 text-sm">
                    <p class="text-amber-900">
                        <span class="font-semibold">Destaque:</span> {{ $destaque->nome }} por {{ number_format((float) $destaque->preco, 2, ',', '.') }} €
                    </p>
                    <a href="{{ route('plantas.show', $destaque) }}" class="shrink-0 font-semibold text-amber-800 hover:text-amber-950">
                        Ver planta →
                    </a>
                </div>
            </aside>
        @endif

        @isset($header)
            <header class="border-b border-green-200 bg-white">
                <div class="mx-auto max-w-6xl px-6 py-6">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="mx-auto max-w-6xl px-6 py-10">
            @isset($slot)
                {{ $slot }}
            @else
                @yield('content')
            @endisset
        </main>
    </body>
</html>
