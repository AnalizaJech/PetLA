<div id="{{$idnameModal}}" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50 p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[95vh] overflow-hidden">

        <!-- Header Dinámico -->
        <div class="text-black p-6 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fa-solid fa-dog fa-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Nuevo Registro</h2>
                        <p class="text-opacity-80 text-sm">{{$subtitle}}</p>
                    </div>
                </div>
                <button onclick="document.getElementById('{{$idnameModal}}').classList.add('hidden')"
                    class="text-black hover:bg-red hover:bg-opacity-20 p-2 rounded-full transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>

            </div>
        </div>

        <!-- Contenido del Formulario -->
        <div class="p-6 overflow-y-auto max-h-[calc(95vh-140px)]">
            <form class="space-y-6" method="{{$method}}" action="{{$action}}" enctype="multipart/form-data">
                @csrf
                
                {{ $slot }}

                <!-- Botones de Acción -->
                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200 sticky bottom-0 bg-white">
                    <button type="button" onclick="document.getElementById('{{$idnameModal}}').classList.add('hidden')"
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
