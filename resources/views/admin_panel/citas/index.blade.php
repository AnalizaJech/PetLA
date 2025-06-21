<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Citas Realizadas</h1>
            <p class="text-gray-600">Administra la información de las citas</p>
        </div>

        <!-- búsqueda y create -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="flex flex-col sm:flex-row gap-4 flex-1">
                    <input id="searchInput" type="text" placeholder="Buscar cita" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none flex-1">
                </div>
                <a href="{{ route('citas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    + Agendar Cita
                </a>
            </div>
        </div>

        <!-- Tabla -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full" id="citaTable">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Item
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mascota
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Veterinario
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Hora
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Motivo
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                        <!-- Filas para mascotas -->
                        @forelse ($citas as $index => $cita)
                        <tr class="hover:bg-gray-50 transition-colors">
                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $cita->mascota->nombre ?? 'No asignado' }}
                            </td>

                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $cita->veterinario->name ?? 'No asignado' }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $cita->fecha_hora }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $cita->motivo }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-1">
                                    @php
                                        $colores=[
                                            "pendiente" => "bg-yellow-100 text-yellow-800",
                                            "confirmado" => "bg-green-100 text-green-800",
                                            "cancelado" => "bg-red-100 text-red-800",
                                        ]
                                        
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colores[($cita->estado)] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ $cita->estado }}
                                    </span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <!-- Botón Editar -->
                                    <a href="{{ route('citas.edit', $cita->id) }}"  class="cursor-pointer text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Botón Eliminar -->
                                    <form id="form-delete-{{ $cita->id }}" action="{{route("citas.destroy", $cita->id)}}" method="POST" >
                                        @csrf
                                        @method("DELETE")

                                        <button type="button" onclick="confirmDelete({{$cita->id}})" class="text-red-600 hover:text-red-800" >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                        
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500">No hay citas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <tr>
            <p id="mensaje" class="hidden text-xs font-medium text-gray-500 text-center  mt-4">No se encontraron resultados de citas</p>
        </tr>
        <!-- Paginación -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 mt-6 rounded-lg shadow-sm">
            {{$citas->links()}}
        </div>


    </div>


</x-app-layout>


<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Está seguro de eliminar la cita?',
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
        let rows = document.querySelectorAll('#citaTable tbody tr');
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