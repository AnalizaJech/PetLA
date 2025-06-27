<x-app-layout>
    <!-- Contenido Principal -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Título y Botón Agregar -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Mis Mascotas</h2>
                <p class="text-gray-600 mt-1">Gestiona la información de tus compañeros peludos</p>
            </div>
            <button onclick="document.getElementById('modalMiMascota').classList.remove('hidden')"  class="mt-4 sm:mt-0 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="fas fa-plus"></i>
                <span>Agregar Mascota</span>
            </button>
        </div>

        @if($mascotas->isEmpty())
            <!-- Estado Vacío -->
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-paw text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No se encontraron mascotas</h3>
                <p class="text-gray-500 mb-6">Intenta ajustar los filtros de búsqueda o agrega tu primera mascota</p>
                <button onclick="document.getElementById('modalMiMascota').classList.remove('hidden')"  class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    Agregar Primera Mascota
                </button>
            </div>
        @else
            <!-- Grid de Cards de Mascotas -->
            <div  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                
                @foreach ($mascotas as $mascota)
                    <x-clientes.mascotas.card-mascota
                        :id="$mascota->id"
                        :foto="$mascota->foto_blob"
                        :nombre="$mascota->nombre"
                        :raza="$mascota->raza"
                        :especie="$mascota->especie"
                        :nacimiento="$mascota->fecha_nacimiento"    
                    />

                @endforeach

                <!-- Card Agregar Nueva Mascota -->
                <div onclick="document.getElementById('modalMiMascota').classList.remove('hidden')"  class="bg-white rounded-2xl shadow-sm border-2 border-dashed border-gray-300 hover:border-blue-400 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 cursor-pointer group">
                    <div class="h-full flex flex-col items-center justify-center p-8 text-center">
                        <div class="w-16 h-16 bg-blue-100 group-hover:bg-blue-200 rounded-full flex items-center justify-center mb-4 transition-colors">
                            <i class="fas fa-plus text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-700 group-hover:text-blue-600 mb-2 transition-colors">Agregar Mascota</h3>
                        <p class="text-sm text-gray-500">Registra una nueva mascota en tu perfil</p>
                    </div>
                </div>
            </div>
        @endif
    </section>

</x-app-layout>

@include("cliente_panel.mis_mascotas.modals.create");
@include("cliente_panel.mis_mascotas.modals.edit");