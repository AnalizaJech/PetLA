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
                <h2 class="text-4xl font-black text-green-700 mb-6 text-center">Iniciar Sesión</h2>

                <!-- Estado de sesión -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Correo Electrónico')" />
                        <x-text-input id="email"
                            class="mt-1 block w-full rounded border-gray-300 focus:ring-green-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required autofocus
                            placeholder="ej: correo@petla.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" />
                        <x-text-input id="password"
                            class="mt-1 block w-full rounded border-gray-300 focus:ring-green-500"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Recordarme -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                            name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">Recuérdame</label>
                    </div>

                    <!-- Acciones -->
                    <div class="flex items-center justify-between">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-green-600 hover:text-green-700" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif

                        <x-primary-button class="bg-green-600 hover:bg-green-700 text-white text-base font-bold px-6 py-3 rounded-md">
                            Iniciar sesión
                        </x-primary-button>
                    </div>
                </form>

                <p class="text-sm text-center mt-6">
                    ¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="text-green-600 font-semibold hover:underline">Regístrate</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
