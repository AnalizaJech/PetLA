
<div id="modalMascota" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50 p-4">
    <div class="bg-white max-h-[80vh] rounded-2xl shadow-2xl w-full max-w-lg transform transition-all duration-300 scale-95 hover:scale-100 mb-15 mt-15">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-white bg-opacity-20 p-2 rounded-full">
                        <i class="fas fa-paw text-xl"></i>
                    </div>
                    <div>
                        <h2 id="modalTitle" class="text-2xl font-bold">Agregar Mascota</h2>
                        <p class="text-blue-100 text-sm">Completa la información</p>
                    </div>
                </div>
                <button onclick="document.getElementById('modalMascota').classList.add('hidden')" 
                        class="text-white hover:bg-white hover:bg-opacity-20 p-2 rounded-full transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Form Content -->
        <div class="overflow-y-auto max-h-[60vh] p-6 space-y-4">
            <form action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <!-- Nombre -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <i class="fas fa-tag text-blue-500"></i>
                        <span>Nombre de la Mascota</span>
                    </label>
                    <input type="text" 
                            name="nombre" 
                            placeholder="Ej: Max, Luna, Rocky..." 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                            required>
                </div>

                <!-- Dueño -->
                <div class="space-y-2">
                    <label for="user_id" class="block text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <i class="fas fa-user text-green-500"></i>
                        <span>Propietario</span>
                    </label>
                    <div class="relative">
                        <select name="user_id" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" 
                                required>
                            <option value="">Seleccione un propietario</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                    </div>
                </div>
                
                <!-- Especie y Raza en Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Especie -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-paw text-purple-500"></i>
                            <span>Especie</span>
                        </label>
                        <input type="text" 
                                name="especie" 
                                placeholder="Perro, Gato, Ave..." 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                                required>
                    </div>

                    <!-- Raza -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-certificate text-orange-500"></i>
                            <span>Raza</span>
                        </label>
                        <input type="text" 
                                name="raza" 
                                placeholder="Golden, Persa..." 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white"
                                required>
                    </div>
                </div>

                <!-- Fecha de Nacimiento -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <i class="fas fa-birthday-cake text-pink-500"></i>
                        <span>Fecha de Nacimiento</span>
                    </label>
                    <input type="date" 
                            name="fecha_nacimiento" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                            required>
                </div>

                <!-- Foto -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <i class="fas fa-camera text-indigo-500"></i>
                        <span>Fotografía</span>
                    </label>
                    <div class="relative">
                        <input type="file" 
                            name="foto_blob" 
                            accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                        >
                    
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="document.getElementById('modalMascota').classList.add('hidden')" 
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