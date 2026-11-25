<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Obrigado pelo registo! Antes de começar, confirme o seu email através da ligação que lhe enviámos. Se não recebeu a mensagem, pode solicitar outra.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            Foi enviada uma nova ligação de confirmação para o email indicado no registo.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Reenviar email de confirmação
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sair
            </button>
        </form>
    </div>
</x-guest-layout>
