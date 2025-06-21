
<x-app-layout>
    <div class="container mx-auto px-4 py-1 bg-white rounded-lg shadow-sm border border-gray-200 mt-5">
        
        <!-- Header -->
        <div class="py-4 px-3 flex items-center justify-between  border-b border-gray-200 ">
            <h2 class="text-lg font-semibold text-gray-800">
                Registrar Cita
            </h2>
            
        </div>

        <!-- Contenido del Formulario -->
        <div class="p-4">
            <form action="{{ route('citas.store') }}" class="space-y-6" method="POST">
                @csrf
                <div class="flex space-x-4">
                    <!-- Mascota -->
                    <div class="space-y-2 w-full">
                        <label for="mascota_id" class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-user text-green-500"></i>
                            <span>Mascota</span>
                        </label>
                        <div class="relative">
                            <select 
                                name="mascota_id" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" 
                                required
                            >
                                <option value="">Seleccione la mascota</option>
                                
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                        
                    </div>

                    <!-- Veterinario -->
                    <div class="space-y-2 w-full">
                        <label for="mascota_id" class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-user text-green-500"></i>
                            <span>Veterinario</span>
                        </label>
                        <div class="relative">
                            <select 
                                name="veterinario_id" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" 
                                required
                            >
                                <option value="">Seleccione el veterinario</option>
                                
                                @foreach($veterinarios as $veterinario)
                                    <option value="{{ $veterinario->id }}">{{ $veterinario->name }}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                        
                    </div>

                </div>

                
                <div class="flex space-x-4">
                    <!-- Fecha Hora -->
                    <div class="space-y-2 w-full">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-tag text-blue-500"></i>
                            <span>Fecha Hora</span>
                        </label>
                        <input 
                            type="date" 
                            name="fecha_hora" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                        >
                    </div>
                    <!-- Motivo -->
                    <div class="space-y-2 w-full">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-tag text-blue-500"></i>
                            <span>Motivo</span>
                        </label>
                        <input 
                            type="text" 
                            name="motivo" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                        >
                    </div>
                
                    <!-- Estado -->
                    <div class="space-y-2 w-full">
                        <label for="precita_id" class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-user text-green-500"></i>
                            <span>Estado</span>
                        </label>
                        <div class="relative">
                            <select 
                                name="estado" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" 
                                required
                            >
                                <option value="">Seleccione el estado</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="confirmado">Confirmado</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>

                </div>


                <!-- Botones de Acción -->
                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                    <a 
                        href="{{ route('citas.index') }}" 
                        class="cursor-pointer flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-200 flex items-center justify-center space-x-2 hover:shadow-md"
                    >
                        <i class="fas fa-times"></i>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit" 
                        class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-xl transition-all duration-200 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-save"></i>
                        <span>Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

