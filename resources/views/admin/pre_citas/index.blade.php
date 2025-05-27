<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Pre-Citas Pendientes</h2>
    </x-slot>

    <div class="p-4">
        @foreach ($preCitas as $preCita)
            <div class="border p-4 mb-4 rounded shadow">
                <p><strong>Cliente:</strong> {{ $preCita->nombre_cliente }}</p>
                <p><strong>Teléfono:</strong> {{ $preCita->telefono }}</p>
                <p><strong>Email:</strong> {{ $preCita->email }}</p>
                <p><strong>Fecha:</strong> {{ $preCita->fecha_solicitada->format('d/m/Y H:i') }}</p>

                <div class="mt-2 flex gap-2">
                    <form method="POST" action="{{ route('admin.pre_citas.convertir', $preCita) }}">
                        @csrf
                        <x-primary-button>Convertir en cita</x-primary-button>
                    </form>

                    <form method="POST" action="{{ route('admin.pre_citas.rechazar', $preCita) }}">
                        @csrf
                        <x-danger-button>Rechazar</x-danger-button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
