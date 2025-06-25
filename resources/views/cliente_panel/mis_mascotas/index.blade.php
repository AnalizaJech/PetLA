<x-app-layout>
    <!-- Contenido Principal -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Título y Botón Agregar -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Mis Mascotas</h2>
                <p class="text-gray-600 mt-1">Gestiona la información de tus compañeros peludos</p>
            </div>
            <button onclick="openAddModal()" class="mt-4 sm:mt-0 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
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
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    Agregar Primera Mascota
                </button>
            </div>
        @else
            <!-- Grid de Cards de Mascotas -->
            <div  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                
                @foreach ($mascotas as $mascota)
                    <!-- Card Mascota 1 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Imagen de la Mascota -->
                        <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600">
                            <img src="{{ $mascota->foto_blob ? asset('storage/'.$mascota->foto_blob) : 'https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg' }}" alt={{$mascota->nombre}} class="object-cover w-full h-full">
                            <div class="absolute top-3 right-3">
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">Saludable</span>
                            </div>
                            <div class="absolute top-3 left-3">
                                <div class="bg-white bg-opacity-90 p-2 rounded-full">
                                    <i class="fas fa-paw text-blue-600"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Información de la Mascota -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-xl font-bold text-gray-900">{{$mascota->nombre}}</h3>
                                <div class="flex space-x-2">
                                    <button onclick="editPet(1)" class="text-blue-600 hover:text-blue-700 p-2 hover:bg-blue-50 rounded-lg transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deletePet(1)" class="text-red-600 hover:text-red-700 p-2 hover:bg-red-50 rounded-lg transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-dog w-4 text-center mr-3 text-blue-500"></i>
                                    <span>{{$mascota->especie}}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-dog w-4 text-center mr-3 text-blue-500"></i>
                                    <span>{{$mascota->raza}}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-birthday-cake w-4 text-center mr-3 text-pink-500"></i>
                                    <span>{{ \Carbon\Carbon::parse($mascota->fecha_nacimiento)->age }} años</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-birthday-cake w-4 text-center mr-3 text-pink-500"></i>
                                    <span>{{$mascota->fecha_nacimiento}}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-weight w-4 text-center mr-3 text-purple-500"></i>
                                    <span>28 kg</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-mars w-4 text-center mr-3 text-blue-500"></i>
                                    <span>Macho</span>
                                </div>
                            </div>
                            
                            <!-- Próxima Cita -->
                            <div class="bg-blue-50 p-3 rounded-lg mb-4">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-calendar-check text-blue-600 mr-2"></i>
                                    <span class="text-blue-800 font-medium">Próxima cita: 15 Dic 2024</span>
                                </div>
                            </div>
                            
                            <!-- Botones de Acción -->
                            <div class="flex space-x-2">
                                <button onclick="viewHistory(1)" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-history mr-1"></i>
                                    Historial
                                </button>
                                <button onclick="bookAppointment(1)" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-calendar-plus mr-1"></i>
                                    Cita
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Card Agregar Nueva Mascota -->
                <div class="bg-white rounded-2xl shadow-sm border-2 border-dashed border-gray-300 hover:border-blue-400 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 cursor-pointer group">
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