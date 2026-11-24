<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Loja de Plantas' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-green-50 text-gray-800">
        <header class="border-b border-green-200 bg-white">
            <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
                <a href="{{ route('plantas.index') }}" class="text-xl font-bold text-green-800">
                    Loja de Plantas
                </a>
                <div class="flex gap-4 text-sm font-medium">
                    <a href="{{ route('plantas.index') }}" class="text-green-700 hover:text-green-900">Plantas</a>
                    <a href="{{ route('categorias.index') }}" class="text-green-700 hover:text-green-900">Categorias</a>
                </div>
            </nav>
        </header>

        <main class="mx-auto max-w-6xl px-6 py-10">
            @yield('content')
        </main>
    </body>
</html>
