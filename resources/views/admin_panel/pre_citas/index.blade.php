<x-app-layout>

    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Pre Citas Realizadas</h1>
            <p class="text-gray-600">Administra la información de las Pre citas</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <x-common.info-card 
                title="Total Pre citas"
                total={{$total}}
                bgIcono="bg-blue-100"
                icono="fas fa-paw"
            />

            <x-common.info-card 
                title="Pendientes"
                total={{$pendientes}}
                bgIcono="bg-yellow-100"
                icono="fas fa-hourglass-half"
            />

            <x-common.info-card 
                title="Aprobadas"
                total={{$aprobadas}}
                bgIcono="bg-green-100"
                icono="fas fa-check-circle"
            />

            <x-common.info-card 
                title="Rechazadas"
                total={{$rechazadas}}
                bgIcono="bg-red-100"
                icono="fas fa-times-circle"
            />

        </div>

        <!-- búsqueda -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input id="searchInput" type="text" placeholder="Buscar por mascota , cliente , fecha ... "
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none w-full">
                </div>
                
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
                                    <div x-data="{ open: false, openModal: false }" >
                                        <!-- Botón de 3 puntitos -->
                                        <button @click="open = !open" class="p-2 rounded-full hover:bg-gray-200 focus:outline-none">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>

                                        @include("admin_panel.pre_citas.partials.menu_despegable")
                                        @include("admin_panel.pre_citas.partials.modal_confirm")

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500">No hay precitas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <tr>
            <p id="mensaje" class="hidden text-xs font-medium text-gray-500 text-center  mt-4">No se encontraron resultados de pre citas</p>
        </tr>
        <!-- Paginación -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 mt-6 rounded-lg shadow-sm">
            {{ $precitas->links() }}
        </div>


    </div>

</x-app-layout>



<script>
    
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
