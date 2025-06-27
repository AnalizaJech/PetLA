<x-form-modal-create
    idnameModal="modalMiMascota"
    subtitle="Agregue su mascota"
    action="{{ route('mascotas.store') }}"
    method="POST"

>
    <!-- 2 fila -->
    <div class="flex space-x-4">
        
        <!-- nombre -->
        <div class="space-y-2 w-full">
            <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                <span>Nombre</span>
            </label>
                <input 
                    type="text" 
                    name="nombre" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                    required
                >
        </div>

        <!-- especie -->
        <div class="space-y-2 w-full">
            <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                <span>Especie</span>
            </label>
                <input 
                    type="text" 
                    name="especie" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                    required
                >
        </div>

        <!-- user_id -->
        <input name="user_id" value={{Auth::user()->id}} hidden >

    </div>


        <!-- raza -->
    <div class="space-y-2">
        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
            <span>Raza</span>
        </label>
            <input 
                type="text" 
                name="raza" 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                required
            >
    </div>


    <!-- fecha_nacimiento -->
    <div class="space-y-2">
        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
            <span>Fecha Nacimiento</span>
        </label>
            <input 
                type="date" 
                name="fecha_nacimiento" 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                required
            >
    </div>

    <!-- foto -->
    <div class="space-y-2">
        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
            <span>Foto</span>
        </label>
            <input 
                type="file" 
                name="foto_blob"
                accept="image/*" 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white" 
                
            >
    </div>

</x-form-modal-create>


