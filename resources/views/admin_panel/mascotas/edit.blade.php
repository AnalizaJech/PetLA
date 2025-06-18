<x-app-layout>
    <div class="container mx-auto px-4 py-12 ">
        <div class="bg-white rounded-xl shadow-xl grid grid-cols-1 md:grid-cols-3 overflow-hidden">

            <div class="bg-blue-50 p-6 flex flex-col items-center justify-center text-center space-y-4">
                <h2 class="text-2xl font-bold text-blue-700">Edita tu mascota</h2>
                <p class="text-blue-600">Modifica la información de tu compañero peludo</p>
                <img src="{{ asset('img/mascotaedit.png') }}" alt="Mascota" class="w-100 h-100 object-contain">
            </div>

            <div class="bg-white rounded-xl md:col-span-2 p-8">
                <!-- Form Content -->
                <div class="p-6 space-y-4">
                    <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        
                        <!-- Nombre -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                                <i class="fas fa-tag text-blue-500"></i>
                                <span>Nombre de la Mascota</span>
                            </label>
                            <input type="text" 
                                name="nombre"
                                value="{{ old('nombre', $mascota->nombre) }}" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                                required
                            >
                        </div>

                        <!-- Dueño -->
                        <div class="space-y-2">
                            <label for="user_id" class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                                <i class="fas fa-user text-green-500"></i>
                                <span>Propietario</span>
                            </label>
                            
                            <div class="relative">
                                <select name="user_id" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" 
                                        required>
                                    <option value="">Seleccione un propietario</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $mascota->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
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
                                    value="{{ old('especie', $mascota->especie) }}"
                                    name="especie" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                                    required
                                >
                            </div>

                            <!-- Raza -->
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                                    <i class="fas fa-certificate text-orange-500"></i>
                                    <span>Raza</span>
                                </label>
                                <input type="text"
                                    value="{{ old('raza', $mascota->raza) }}" 
                                    name="raza" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white"
                                    required
                                >
                            </div>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                                <i class="fas fa-birthday-cake text-pink-500"></i>
                                <span>Fecha de Nacimiento</span>
                            </label>
                            <input type="date"
                                value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento) }}"
                                name="fecha_nacimiento" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                                required
                            >
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
                                    value="{{ old('foto_blob', $mascota->foto_blob) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                            <a 
                                href="{{ route('mascotas.index') }}"
                                class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-200 flex items-center justify-center space-x-2 hover:shadow-md"
                            >
                                <i class="fas fa-times"></i>
                                <span>Cancelar</span>
                            </a>
                            <button 
                                type="submit" 
                                class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-xl transition-all duration-200 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                            >
                                <i class="fas fa-save"></i>
                                <span>Actualizar</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

</x-app-layout>
