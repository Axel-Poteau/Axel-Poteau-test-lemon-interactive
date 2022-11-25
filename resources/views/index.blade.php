<x-guest-layout>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="max-w-xl">
                            <h1>Bienvenue sur le test réalisé pour Lemon Interactive par Axel Poteau</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6">
                <x-primary-button><a href="{{ route('login') }}">{{ __('Se Connecter') }}</a></x-primary-button>
                <x-primary-button><a href="{{ route('register') }}">{{ __("S'Enregistrer") }}</a></x-primary-button>
            </div>

        </div>
</x-guest-layout>
