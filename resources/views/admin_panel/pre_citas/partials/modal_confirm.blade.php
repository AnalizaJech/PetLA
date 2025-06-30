<!-- Modal -->
<div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 p-4">
    <div class="bg-white px-6 rounded-2xl shadow-2xl w-full max-w-4xl max-h-[95vh] overflow-hidden">
        <!-- Header -->
        <div class="mb-4 border-b p-6 flex items-center gap-2">
            <i class="fas fa-cogs text-green-600"></i>
            <h2 class="text-lg font-bold">Procesar Precita</h2>
        </div>

        <div class="overflow-y-auto max-h-[calc(95vh-140px)]">
            <!-- Detalles de la solicitud -->
            <div class="mb-4 px-3">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 shadow">
                    <h3 class="text-base font-bold text-blue-700 mb-3 flex items-center gap-2">
                        <i class="fas fa-info-circle"></i>
                        Detalles de la solicitud
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-3">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-paw text-pink-500"></i>
                            <span class="font-semibold text-gray-700">Mascota:</span>
                            <span class="text-gray-800">{{ $precita->mascota->nombre ?? 'N/A' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-user text-blue-500"></i>
                            <span class="font-semibold text-gray-700">Cliente:</span>
                            <span class="text-gray-800">{{ $precita->mascota->usuario->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-green-500"></i>
                            <span class="font-semibold text-gray-700">Fecha solicitada:</span>
                            <span class="text-gray-800">{{ $precita->fecha_solicitada }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-clock text-orange-500"></i>
                            <span class="font-semibold text-gray-700">Rango hora:</span>
                            <span class="text-gray-800">{{ $precita->rango_hora }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-comment-dots text-purple-500"></i>
                            <span class="font-semibold text-gray-700">Motivo:</span>
                            <span class="text-gray-800">{{ $precita->motivo }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acciones a realizar -->
            <form method="POST" x-data="{ accion: '' }" action="{{route('precitas.accion',$precita->id) }}" class="space-y-4 px-3">
                @csrf
                <div class="mb-2">
                    <label class="mb-3 block font-semibold">Acción a realizar:</label>
                    <div class="flex flex-col gap-4 ">
                        <label class="flex items-center gap-2 bg-green-50 px-3 py-2 rounded-lg cursor-pointer hover:bg-green-100 transition shadow-sm w-full"
                            :class="accion === 'aceptar' ? 'ring-2 ring-green-400' : ''">
                            <input type="radio" name="accion" value="aceptar" class="form-radio text-green-600" x-model="accion" required>
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="font-semibold text-green-700">Aceptar Pre cita</span>
                        </label>
                        <label class="flex items-center gap-2 bg-yellow-50 px-3 py-2 rounded-lg cursor-pointer hover:bg-yellow-100 transition shadow-sm w-full"
                            :class="accion === 'cambiar_fecha' ? 'ring-2 ring-yellow-400' : ''">
                            <input type="radio" name="accion" value="cambiar_fecha" class="form-radio text-yellow-500" x-model="accion">
                            <i class="fas fa-calendar-edit text-yellow-500"></i>
                            <span class="font-semibold text-yellow-700">Cambiar fecha</span>
                        </label>
                        <label class="flex items-center gap-2 bg-red-50 px-3 py-2 rounded-lg cursor-pointer hover:bg-red-100 transition shadow-sm w-full"
                            :class="accion === 'rechazar' ? 'ring-2 ring-red-400' : ''">
                            <input type="radio" name="accion" value="rechazar" class="form-radio text-red-600" x-model="accion">
                            <i class="fas fa-times-circle text-red-600"></i>
                            <span class="font-semibold text-red-700">Rechazar</span>
                        </label>
                    </div>
                </div>

                <!-- Si acepta o cambia fecha, mostrar veterinario y notas -->
                <template x-if="accion === 'aceptar' || accion === 'cambiar_fecha'">
                    <div>
                        <div class="mb-2">
                            <label for="veterinario" class="block font-semibold mb-1">Asignar veterinario:</label>
                            <select name="veterinario_id" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" >
                                <option value="">Seleccione un propietario</option>
                                @foreach($veterinarios as $veterinario)
                                    <option value="{{$veterinario->id}}" class="p-2 rounded-lg">{{$veterinario->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="notas" class="block font-semibold mb-1">Notas:</label>
                            <input type="text" name="notas" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" placeholder="Notas adicionales...">
                        </div>
                    </div>
                </template>

                <!-- Si cambia fecha, mostrar campo de fecha -->
                <template x-if="accion === 'cambiar_fecha'">
                    <div class="mb-2">
                        <label for="nueva_fecha" class="block font-semibold mb-1">Nueva fecha:</label>
                        <input type="date" name="nueva_fecha" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" placeholder="Nueva fecha">
                    </div>
                </template>

                <!-- Si rechaza, solo mostrar notas -->
                <template x-if="accion === 'rechazar'">
                    <div class="mb-2">
                        <label for="notas_rechazo" class="block font-semibold mb-1">Notas:</label>
                        <input type="text" name="notas"  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-gray-400 bg-gray-50 focus:bg-white appearance-none" placeholder="Motivo del rechazo...">
                    </div>
                </template>


                <div class="flex flex-col sm:flex-row gap-3 py-6 border-t border-gray-200 bg-white">
                    <button type="button" @click="openModal = false" 
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
