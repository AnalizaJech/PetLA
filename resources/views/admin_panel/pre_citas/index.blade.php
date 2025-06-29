<x-app-layout>

    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Pre Citas Realizadas</h1>
            <p class="text-gray-600">Administra la información de las Pre citas</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Pre citas</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $total }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-paw"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Pendientes</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $pendientes }}</p>

                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Aprobadas</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $aprobadas }}</p>

                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Rechazadas</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $rechazadas }}</p>

                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
            </div>

        </div>

        <!-- búsqueda y create -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input id="searchInput" type="text" placeholder="Buscar por mascota , cliente , fecha ... "
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none w-full">
                </div>
                {{-- <a href="{{ route('precitas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    + Agendar Pre Cita
                </a> --}}
            </div>
        </div>

        <!-- Tabla -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full" id="precitaTable">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Item
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente & Mascota
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Contacto
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Motivo
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Preferida
                            </th>
                        
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Observaciones
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <!-- Filas para mascotas -->
                        @forelse ($precitas as $index => $precita)
                            <tr class="hover:bg-gray-50 transition-colors">

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $index + 1 }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <span class="flex items-center gap-2">
                                        <i class="fas fa-user text-blue-500"></i>
                                        {{ $precita->mascota->usuario->name ?? 'N/A' }}
                                    </span>
                                    <span class="flex items-center gap-2 mt-1">
                                        <i class="fas fa-paw text-pink-500"></i>
                                        {{ $precita->mascota->nombre ?? 'N/A' }}
                                    </span>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <span class="flex items-center gap-2 mb-1">
                                        <i class="fas fa-phone-alt text-green-500"></i>
                                        {{ $precita->mascota->usuario->telefono ?? 'N/A' }}
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <i class="fas fa-envelope text-yellow-500"></i>
                                        {{ $precita->mascota->usuario->email ?? 'N/A' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $precita->motivo }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col text-xs gap-1">
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-calendar-alt text-blue-400"></i>
                                            {{ $precita->fecha_solicitada }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-clock text-orange-400"></i>
                                            {{ $precita->rango_hora }}
                                        </span>
                                    </div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-wrap gap-1">
                                        @php
                                            $colores = [
                                                'pendiente' => 'bg-yellow-100 text-yellow-800',
                                                'aprobado' => 'bg-green-100 text-green-800',
                                                'rechazado' => 'bg-red-100 text-red-800',
                                            ];

                                        @endphp
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colores[$precita->estado] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $precita->estado }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $precita->observaciones ?? 'Sin observaciones' }}
                                </td>

                                <td class="px-6 py-auto whitespace-nowrap text-sm font-medium">
                                    <div x-data="{ open: false }" >
                                        <!-- Botón de 3 puntitos -->
                                        <button @click="open = !open" class="p-2 rounded-full hover:bg-gray-200 focus:outline-none">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <!-- Menú desplegable -->
                                        <div x-show="open" @click.away="open = false"
                                            class="absolute right-20 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10 py-1">
                                            <!-- Editar 
                                            <a href="{{ route('precitas.edit', $precita->id) }}"
                                                class="flex items-center px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a> -->
                                            <!-- Eliminar 
                                            <button type="button" onclick="confirmDelete({{ $precita->id }})"
                                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                <i class="fas fa-trash-alt mr-2"></i> Eliminar
                                            </button> -->
                                            <!-- Procesar Precita -->
                                            <a href="#"
                                                class="flex items-center px-4 py-2 text-sm text-green-600 hover:bg-gray-100">
                                                <i class="fas fa-cogs mr-2"></i> Procesar Precita
                                            </a>
                                            <!-- Llamar Cliente -->
                                            <a href="tel:{{ $precita->mascota->usuario->telefono ?? '' }}"
                                                class="flex items-center px-4 py-2 text-sm text-green-700 hover:bg-gray-100">
                                                <i class="fas fa-phone-alt mr-2"></i> Llamar Cliente
                                            </a>
                                            <!-- Enviar Gmail -->
                                            <a href="mailto:{{ $precita->mascota->usuario->email ?? '' }}"
                                                class="flex items-center px-4 py-2 text-sm text-yellow-600 hover:bg-gray-100">
                                                <i class="fas fa-envelope mr-2"></i> Enviar Gmail
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <!-- Botón Editar -->
                                        <a href="{{ route('precitas.edit', $precita->id) }}"
                                            class="cursor-pointer text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Botón Eliminar -->
                                        <form id="form-delete-{{ $precita->id }}"
                                            action="{{ route('precitas.destroy', $precita->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" onclick="confirmDelete({{ $precita->id }})"
                                                class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500">No hay precitas
                                    registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <tr>
            <p id="mensaje" class="hidden text-xs font-medium text-gray-500 text-center  mt-4">No se encontraron
                resultados de pre citas</p>
        </tr>
        <!-- Paginación -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 mt-6 rounded-lg shadow-sm">
            {{ $precitas->links() }}
        </div>


    </div>


</x-app-layout>



<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Está seguro de eliminar la pre cita?',
            text: "Esta acción es permanente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
        }).then((result) => {
            if (result.isConfirmed) {

                document.getElementById('form-delete-' + id).submit();
            }
        });
    }

    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#precitaTable tbody tr');
        let encontrado = false;
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            const coincide = text.includes(filter);
            row.style.display = coincide ? '' : 'none';
            if (coincide) encontrado = true;
        });

        document.getElementById('mensaje').classList.toggle('hidden', encontrado);

    });
</script>
