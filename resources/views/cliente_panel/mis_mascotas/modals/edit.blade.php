<div id="modalEditMiMascota"
    class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50 p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[95vh] overflow-hidden">
        <!-- Header -->
        <div class="text-black p-6 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fa-solid fa-dog fa-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Actualizar Registro</h2>
                        <p class="text-opacity-80 text-sm">Actualiza el registor de tu mascota</p>
                    </div>
                </div>
                <button onclick="closeModal()"
                    class="text-black hover:bg-red hover:bg-opacity-20 p-2 rounded-full transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>

            </div>
        </div>

        <!-- Contenido del Formulario -->
        <div class="px-6 overflow-y-auto max-h-[calc(95vh-140px)]">
            <form id="formEditMiMascota" class="space-y-6" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <!-- 2 fila -->
                <div class="flex space-x-4">

                    <!-- nombre -->
                    <div class="space-y-2 w-full">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <span>Nombre</span>
                        </label>
                        <input id="mascotaName" type="text" name="nombre"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white"
                            required>
                    </div>

                    <!-- especie -->
                    <div class="space-y-2 w-full">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <span>Especie</span>
                        </label>
                        <input id="mascotaEspecie" type="text" name="especie"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white"
                            required>
                    </div>

                    <!-- user_id -->
                    <input name="user_id" value={{ Auth::user()->id }} hidden>

                </div>

                <div class="flex space-x-4">
                    <!-- peso -->
                    <div class="space-y-2 w-full">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <span>Peso</span>
                        </label>
                        <input type="text" name="peso" id="mascotaPeso"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white">
                    </div>

                    <!-- sexo -->
                    <div class="space-y-2 w-full">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <span>Sexo</span>
                        </label>
                        <select name="sexo" id="mascotaSexo"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white"
                            required>
                            <option value="" selected disabled>Seleccione sexo</option>
                            <option value="hembra">Hembra</option>
                            <option value="macho">Macho</option>
                        </select>

                    </div>
                </div>


                <!-- raza -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <span>Raza</span>
                    </label>
                    <input id="mascotaRaza" type="text" name="raza"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white"
                        required>
                </div>


                <!-- fecha_nacimiento -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <span>Fecha Nacimiento</span>
                    </label>
                    <input id="mascotaNacimiento" type="date" name="fecha_nacimiento"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white"
                        required>
                </div>

                <!-- foto -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <span>Foto - png/jpg</span>
                    </label>
                    <input id="mascotaFoto" type="file" name="foto_blob" accept="image/*"
                        placeholder="seleccione archivo"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white">
                    <img id="preview" class="mt-2 w-32 h-32 object-cover rounded-xl">
                </div>


                <!-- Botones de Acción -->
                <div class=" flex flex-col sm:flex-row gap-3 py-5 border-t border-gray-200 sticky bottom-0 bg-white ">
                    <button type="button" onclick="closeModal()"
                        class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-200 flex items-center justify-center space-x-2 hover:shadow-md">
                        <i class="fas fa-times"></i>
                        <span>Cancelar</span>
                    </button>
                    <button type="submit"
                        class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-xl transition-all duration-200 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-save"></i>
                        <span>Actualizar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('mascotaFoto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const url = URL.createObjectURL(file);

            document.getElementById('preview').src = url;
        }
    });
</script>
