<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Clientes</h1>
            <p class="text-gray-600">Administra la información de los clientes</p>
        </div>

        <!-- búsqueda y create -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="flex flex-col sm:flex-row gap-4 flex-1">
                    <input id="searchInput" type="text" placeholder="Buscar Cliente-Dueño de mascota" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none flex-1">
                </div>
                <a  class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    + Agregar Cliente 
                </a>
            </div>
        </div>

        <!-- Tabla -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full" id="clienteTable">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Item
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                        <!-- Filas para clientes -->
                        @forelse ($duenos as $index => $dueno)
                        <tr class="hover:bg-gray-50 transition-colors">
                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $dueno->name ?? 'No asignado' }}
                            </td>

                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $dueno->email ?? 'No asignado' }}
                            </td>


                            
            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <!-- Botón Editar -->
                                    <a  class="cursor-pointer text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Botón Eliminar -->
                                    <form id="delete-dueno-{{ $dueno->id }}" action="{{route("duenos.destroy", $dueno->id)}}"   method="POST" >
                                        @csrf
                                        @method("DELETE")

                                        <button type="button"  onclick="alertDelete('delete-dueno-{{ $dueno->id }}','al cliente')"  class="text-red-600 hover:text-red-800" >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                        
                                </div>
                            </td>
                        </tr>
                        @empty
                            <x-common.empty-table title="No hay clientes registrados." />
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <tr>
            <p id="mensaje" class="hidden text-xs font-medium text-gray-500 text-center  mt-4">No se encontraron resultados de Clientes o dueños de mascota</p>
        </tr>
        <!-- Paginación -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 mt-6 rounded-lg shadow-sm">
            {{$duenos->links()}}
        </div>


    </div>


</x-app-layout>


<script>

    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#clienteTable tbody tr');
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