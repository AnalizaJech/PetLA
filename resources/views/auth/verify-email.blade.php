<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-100 to-white flex items-center justify-center px-4">
        <div class="w-full max-w-6xl bg-white rounded-xl shadow-xl flex flex-col md:flex-row overflow-hidden min-h-[660px]">

            <!-- Branding -->
            <a href="{{ url('/') }}" class="bg-green-100 hover:bg-green-200 flex flex-col items-center justify-center p-8 md:w-1/2 transition cursor-pointer">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="PetLa Logo" class="w-32 md:w-48 lg:w-60 opacity-80 pointer-events-none" />
                <span class="text-4xl font-black text-green-700 mt-4">PetLa</span>
                <span class="text-base text-green-600 mt-2">Cuidamos a tus mejores amigos</span>
            </a>

            <!-- Contenido -->
            <div class="flex-1 p-8 flex flex-col justify-center">
                <h2 class="text-3xl md:text-4xl font-black text-green-700 mb-6 text-center">Verifica tu correo electrónico</h2>

                <div class="text-sm text-gray-700 mb-4 leading-relaxed text-center">
                    Gracias por registrarte. Antes de continuar, por favor verifica tu dirección de correo haciendo clic en el enlace que te acabamos de enviar.  
                    <br><br>
                    Si no lo has recibido, con gusto te enviaremos otro.
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 text-center">
                        ¡Un nuevo enlace de verificación ha sido enviado a tu correo!
                    </div>
                @endif

                <div class="flex flex-col md:flex-row items-center justify-between gap-4 mt-6">
                    <!-- Reenviar -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <x-primary-button class="bg-green-600 hover:bg-green-700 text-white text-base font-bold px-6 py-3 rounded-md">
                            Reenviar correo de verificación
                        </x-primary-button>
                    </form>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm underline text-gray-600 hover:text-gray-800">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
