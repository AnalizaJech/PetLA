<x-app-layout>

        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Gestión de Mascotas</h1>
                <p class="text-gray-600">Administra la información de las mascotas</p>
            </div>

            <!-- búsqueda y create -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                    <div class="flex flex-col sm:flex-row gap-4 flex-1">
                        <input id="searchInput" type="text" placeholder="Buscar por nombre o teléfono..." class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none flex-1">
                    </div>
                    <button onclick="document.getElementById('modalMascota').classList.remove('hidden')" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                        + Nueva Mascota
                    </button>
                </div>
            </div>

            <!-- Tabla -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full" id="mascotaTable">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Item
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dueño
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Especie
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Raza
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha Nacimiento
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Imagen
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            
                            <!-- Filas para mascotas -->
                            @forelse ($mascotas as $index => $mascota)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"> {{ $mascota->nombre }}</div> 
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $mascota->usuario->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $mascota->especie }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-wrap gap-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ $mascota->raza }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $mascota->fecha_nacimiento }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                    
                                        <div onclick="showImageModal('{{ $mascota->foto_blob ? asset('storage/'.$mascota->foto_blob) : 'https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg' }}')" class="w-20 h-20 overflow-hidden rounded shadow cursor-pointer border border-gray-300" >
                                            <img src="{{ $mascota->foto_blob ? 'storage/'.$mascota->foto_blob : 'https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg' }}" alt={{$mascota->nombre}} class="object-cover w-full h-full">
                                        </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <!-- Botón Editar -->
                                        <a href="{{ route('mascotas.edit', $mascota->id) }}" class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Botón Eliminar -->
                                        <form id="delete-mascota-{{ $mascota->id }}" action="{{route("mascotas.destroy", $mascota->id)}}" method="POST" >
                                            @csrf
                                            @method("DELETE")

                                            <button type="button" onclick="alertDelete('delete-mascota-{{ $mascota->id }}','la mascota')" class="text-red-600 hover:text-red-800" >
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                            
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <x-common.empty-table title="No hay mascotas registrados." />
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <tr>
                <p id="mensaje" class="hidden text-xs font-medium text-gray-500 text-center  mt-4">No se encontraron resultados</p>
            </tr>

            <!-- Paginación -->
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 mt-6 rounded-lg shadow-sm">
                {{$mascotas->links()}}
            </div>
        </div>

        <!-- Modal para ampliar imagen -->
        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50">
            <div class="relative">
                <img id="modalImage" src=""  class="max-w-[90vw] max-h-[90vh] rounded shadow-xl">
                <button onclick="closeImageModal()" class="absolute top-2 right-2 "><i class="fas fa-times text-red-500 cursor-pointer"></i></button>
            </div>
        </div>

</x-app-layout>

@include('admin_panel.mascotas.modals.create')

<script>

    function showImageModal(imgUrl) {
        document.getElementById('modalImage').src = imgUrl;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeImageModal(){
        document.getElementById('imageModal').classList.add('hidden');
    }

    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#mascotaTable tbody tr');
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