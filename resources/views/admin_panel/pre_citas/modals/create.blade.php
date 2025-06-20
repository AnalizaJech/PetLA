
<div id="modalPrecita" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50 p-4">
    <div class="bg-white max-h-[80vh] rounded-2xl shadow-2xl w-full max-w-lg transform transition-all duration-300 scale-95 hover:scale-100 mb-15 mt-15">
        
        <!-- Header -->
        <div class="p-6 flex items-center justify-between  border-b border-gray-200 ">
            <h2 class="text-lg font-semibold text-gray-800">
                Registrar Pre-Cita
            </h2>
            <button onclick="document.getElementById('modalPrecita').classList.add('hidden')" 
                    class="text-gray-500 hover:text-red-600">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <!-- Contenido del Formulario -->
        <div class="p-6">
            <form class="space-y-6" method="POST">
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
                </div>


                <div class="flex space-x-4">
                    <!-- Fecha Solicitada -->
                    <div class="space-y-2 w-full">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-tag text-blue-500"></i>
                            <span>Fecha Solicitada</span>
                        </label>
                        <input 
                            type="date" 
                            name="fecha_solicitada" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                        >
                    </div>
                    <!-- Rango Hora -->
                    <div class="space-y-2 w-full">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-tag text-blue-500"></i>
                            <span>Rango Hora</span>
                        </label>
                        <input 
                            type="text" 
                            name="rango_hora" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                        >
                    </div>
                </div>
                <!-- Estado -->

                <!-- Observaciones -->
                <div class="space-y-2 w-full">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <i class="fas fa-tag text-blue-500"></i>
                        <span>Observaciones</span>
                    </label>
                    <input 
                        type="text" 
                        name="observaciones" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                    >
                </div>

                    

                <!-- Botones de Acción -->
                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="document.getElementById('modalPrecita').classList.add('hidden')"  
                            class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-200 flex items-center justify-center space-x-2 hover:shadow-md">
                        <i class="fas fa-times"></i>
                        <span>Cancelar</span>
                    </button>
                    <button type="submit" 
                        class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-xl transition-all duration-200 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-save"></i>
                        <span>Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>