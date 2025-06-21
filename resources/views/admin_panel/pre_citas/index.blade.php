<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Pre Citas Realizadas</h1>
            <p class="text-gray-600">Administra la información de las Pre citas</p>
        </div>

        <!-- búsqueda y create -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="flex flex-col sm:flex-row gap-4 flex-1">
                    <input id="searchInput" type="text" placeholder="Buscar pre cita" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none flex-1">
                </div>
                <a href="{{ route('precitas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    + Agendar Pre Cita
                </a>
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
                                Mascota
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dueño
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Motivo
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Solicitada
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rango Hora
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
                                {{ $precita->mascota->nombre ?? 'N/A' }}
                            </td>

                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ Auth::user()->name }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $precita->motivo }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-xs flex flex-wrap gap-1">
                                        {{ $precita->fecha_solicitada }}
                                    
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $precita->rango_hora }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-1">
                                    @php
                                        $colores=[
                                            "pendiente" => "bg-yellow-100 text-yellow-800",
                                            "aprobado" => "bg-green-100 text-green-800",
                                            "rechazado" => "bg-red-100 text-red-800",
                                        ]
                                        
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colores[($precita->estado)] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ $precita->estado }}
                                    </span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $precita->observaciones ?? 'Sin observaciones' }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <!-- Botón Editar -->
                                    <a href="{{ route('precitas.edit', $precita->id) }}"   class="cursor-pointer text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Botón Eliminar -->
                                    <form  id="form-delete-{{ $precita->id }}" action="{{route("precitas.destroy", $precita->id)}}" method="POST" >
                                        @csrf
                                        @method("DELETE")

                                        <button type="button" onclick="confirmDelete({{$precita->id}})"  class="text-red-600 hover:text-red-800" >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                        
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
            {{$precitas->links()}}
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


