<x-guest-layout>
    <div class="max-w-xl mx-auto mt-8 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Solicita tu pre-cita</h1>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('pre_cita.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre completo</label>
                <input type="text" name="nombre_cliente" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Teléfono</label>
                <input type="text" name="telefono" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Correo electrónico</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Fecha y hora deseada</label>
                <input type="datetime-local" name="fecha_solicitada" class="w-full border rounded p-2" required>
            </div>

            <x-primary-button>Enviar solicitud</x-primary-button>
        </form>
    </div>
</x-guest-layout>
