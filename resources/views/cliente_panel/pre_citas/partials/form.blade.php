<div class="lg:col-span-2">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 sticky top-8">

        <!-- Header del Formulario -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6 rounded-t-2xl">
            <div class="flex items-center space-x-3">
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-calendar-plus text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Solicitar</h3>
                    <p class="text-blue-100 text-sm">Completa los datos para solicitar tu cita</p>
                </div>
            </div>
        </div>

        <!-- Formulario -->
        <div class="p-6">
            <form class="space-y-6" method="POST" action="{{route('precitas.store')}}">
                @csrf
                <!-- Selección de Mascota -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <i class="fas fa-paw text-blue-500"></i>
                        <span>Selecciona tu Mascota</span>
                    </label>
                    <div class="space-y-3">
                        @forelse($mascotas as $mascota)
                            <label
                                class="flex items-center p-3 border border-gray-200 rounded-xl hover:bg-blue-50 hover:border-blue-300 cursor-pointer transition-all">
                                <input required  type="radio" name="mascota_id" value={{$mascota->id}}
                                    class="text-blue-600 focus:ring-blue-500">
                                <div class="ml-3 flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <img src="{{$mascota->foto_blob ? asset('storage/' . $mascota->foto_blob) :'https://png.pngtree.com/png-clipart/20230924/original/pngtree-dog-icon-logo-illustration-template-pet-animal-art-vector-png-image_12850819.png'}}" alt={{$mascota->nombre}}>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{$mascota->nombre}}</p>
                                        <p class="text-xs text-gray-500">{{$mascota->especie}}</p>
                                        <p class="text-xs text-gray-500">{{$mascota->raza}} • {{$mascota->fecha_nacimiento}}</p>


                                    </div>
                                </div>
                            </label>
                        @empty
                            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md my-4">
                                <p class="text-sm font-medium">Antes agregue una mascota.</p>
                            </div>
                        @endforelse

                        
                    </div>
                </div>

                <!-- Estado -->
                <input type="text" name="estado" value="pendiente" hidden>

                <!-- Fecha y hora -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-calendar text-purple-500"></i>
                            <span>Fecha Preferida</span>
                        </label>
                        <input type="date" name="fecha_solicitada"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-clock text-orange-500"></i>
                            <span>Rango Hora</span>
                        </label>
                        
                        <select name="rango_hora"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none"
                            required>
                            <option value="" selected disabled>Seleccione un rango</option>
                            <option value="8:00 am - 9:00 am">8:00 am - 9:00 am</option>
                            <option value="9:00 am - 10:00 am">9:00 am - 10:00 am</option>
                            <option value="10:00 am - 11:00 am">10:00 am - 11:00 am</option>
                            <option value="11:00 am - 12:00 pm">11:00 am - 12:00 pm</option>
                            <option value="12:00 pm - 1:00 pm">12:00 pm - 1:00 pm</option>
                            <option value="1:00 pm - 2:00 pm">1:00 pm - 2:00 pm</option>
                            <option value="2:00 pm - 3:00 pm">2:00 pm - 3:00 pm</option>
                            <option value="3:00 pm - 4:00 pm">3:00 pm - 4:00 pm</option>
                            <option value="4:00 pm - 5:00 pm">4:00 pm - 5:00 pm</option>
                            <option value="5:00 pm - 6:00 pm">5:00 pm - 6:00 pm</option>
                        </select>

                        {{-- <input name="rango_hora"
                            type="text"
                            placeholder="Ejp: entre 8 y 9 am"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none"
                            required> --}}
                    </div>
                </div>

                <!-- Motivo -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <i class="fas fa-notes-medical text-teal-500"></i>
                        <span>Motivo de la Consulta</span>
                    </label>
                    <textarea required name="motivo" rows="4" placeholder="Describe los síntomas o el motivo de la consulta..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white resize-none"></textarea>
                </div>

                <!-- Observaciones -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center space-x-2">
                        <i class="fas fa-notes-medical text-teal-500"></i>
                        <span>Observaciones</span>
                    </label>
                    <textarea name="observaciones" rows="4" placeholder="Observaciones ...."
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white resize-none"></textarea>
                </div>

                <!-- Botón de Envío -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-4 px-6 rounded-xl font-medium transition-all duration-200 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="fas fa-paper-plane"></i>
                    <span>Solicitar Pre-Cita</span>
                </button>
                
            </form>
        </div>
    </div>
</div>
