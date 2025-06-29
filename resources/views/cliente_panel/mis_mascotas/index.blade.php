<x-app-layout>
    <!-- Contenido Principal -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Título -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Mis Mascotas</h2>
                <p class="text-gray-600 mt-1">Gestiona la información de tus compañeros peludos</p>
            </div>
        </div>

        @if ($mascotas->isEmpty())
            <!-- Estado Vacío -->
            @include("cliente_panel.mis_mascotas.partials.addCard");
        @else
            <!-- Grid de Cards de Mascotas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                @foreach ($mascotas as $mascota)
                    <x-clientes.mascotas.card-mascota :id="$mascota->id" :foto="$mascota->foto_blob" :nombre="$mascota->nombre"
                        :peso="$mascota->peso" :sexo="$mascota->sexo" :raza="$mascota->raza" :especie="$mascota->especie" :nacimiento="$mascota->fecha_nacimiento" />
                @endforeach

                <!-- Card Agregar Nueva Mascota -->
                @include("cliente_panel.mis_mascotas.partials.addCard");

            </div>
        @endif
    </section>

</x-app-layout>

@include('cliente_panel.mis_mascotas.modals.create');
@include('cliente_panel.mis_mascotas.modals.edit');
