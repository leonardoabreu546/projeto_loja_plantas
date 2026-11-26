<nav class="border-b border-green-200 bg-white">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-6 py-4">
        <a href="{{ route('plantas.index') }}" class="text-xl font-bold text-green-800">Loja de Plantas</a>

        <div class="flex flex-wrap items-center gap-4 text-sm font-medium">
            <a href="{{ route('plantas.index') }}" class="text-green-700 hover:text-green-900">Plantas</a>
            <a href="{{ route('categorias.index') }}" class="text-green-700 hover:text-green-900">Categorias</a>
            <a href="{{ route('contacto') }}" class="text-green-700 hover:text-green-900">Contacto</a>

            @auth
                @if (Auth::user()->is_admin)
                    <a href="{{ route('admin.categorias.index') }}" class="text-green-700 hover:text-green-900">Admin:Categorias</a>
                    <a href="{{ route('admin.plantas.index') }}" class="text-green-700 hover:text-green-900">Admin: Plantas</a>
                @endif
                <a href="{{ route('dashboard') }}" class="text-green-700 hover:text-green-900">Dashboard</a>
                <span class="text-gray-600">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="font-semibold text-red-700 hover:text-red-900">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-green-700 hover:text-green-900">Entrar</a>
                <a href="{{ route('register') }}" class="rounded-lg bg-green-700 px-4 py-2 text-white hover:bg-green-800">Registar</a>
            @endauth
        </div>
    </div>
</nav>
