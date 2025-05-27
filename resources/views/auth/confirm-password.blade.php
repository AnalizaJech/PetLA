<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-100 to-white flex items-center justify-center px-4">
        <div class="w-full max-w-6xl bg-white rounded-xl shadow-xl flex flex-col md:flex-row overflow-hidden min-h-[660px]">

            <!-- Branding -->
            <a href="{{ url('/') }}" class="bg-green-100 hover:bg-green-200 flex flex-col items-center justify-center p-8 md:w-1/2 transition cursor-pointer">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="PetLa Logo" class="w-32 md:w-48 lg:w-60 opacity-80 pointer-events-none" />
                <span class="text-4xl font-black text-green-700 mt-4">PetLa</span>
                <span class="text-base text-green-600 mt-2">Cuidamos a tus mejores amigos</span>
            </a>

            <!-- Formulario -->
            <div class="flex-1 p-8 flex flex-col justify-center">
                <h2 class="text-3xl md:text-4xl font-black text-green-700 mb-6 text-center">Confirma tu contraseña</h2>

                <p class="text-sm text-gray-700 mb-4 text-center leading-relaxed">
                    Esta es una área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.
                </p>

                <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                    @csrf

                    <!-- Contraseña -->
                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" />
                        <x-text-input id="password"
                            class="mt-1 block w-full rounded border-gray-300 focus:ring-green-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Botón -->
                    <div class="flex justify-end">
                        <x-primary-button class="bg-green-600 hover:bg-green-700 text-white text-base font-bold px-6 py-3 rounded-md">
                            Confirmar
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
