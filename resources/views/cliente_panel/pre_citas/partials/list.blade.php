<div class="lg:col-span-3">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header de la Lista -->
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 text-white p-6 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-list-alt text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Mis Pre-Citas</h3>
                        <p class="text-gray-300 text-sm">Estado de tus solicitudes de cita</p>
                    </div>
                </div>

                <!-- Filtros -->
                <div class="flex space-x-2">
                    <select id="filtroEstado"
                        class="px-3 py-2 bg-white bg-opacity-20 text-white rounded-lg text-sm border border-white border-opacity-30 focus:outline-none">
                        <option value="">Todos</option>
                        <option value="pendiente">Pendientes</option>
                        <option value="confirmada">Confirmadas</option>
                        <option value="cancelada">Canceladas</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Lista de Pre-Citas -->
        <div class="p-6">
            <div id="listaCitas" class="space-y-4">

                @forelse ($precitas as $precita)
                    @include("cliente_panel.pre_citas.partials.precitaCard")
                @empty
                    <!-- Estado Vacío -->
                    <div id="estadoVacio" class="hidden text-center py-12">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-times text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">No hay pre-citas</h3>
                        <p class="text-gray-500">Solicita tu primera pre-cita usando el formulario</p>
                    </div>
                @endforelse

                <!-- Pre-Cita 2 - Confirmada 
                <div
                    class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition-all duration-200 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-l-green-400">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-2">
                                    <h4 class="text-lg font-semibold text-gray-900">Vacunación - Luna</h4>
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">Confirmada</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-3">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-calendar text-gray-400"></i>
                                        <span>18 Dic 2024</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-clock text-gray-400"></i>
                                        <span>11:30 AM</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-user-md text-gray-400"></i>
                                        <span>Dr. Carlos Mendoza</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-cat text-gray-400"></i>
                                        <span>Persa</span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-700 bg-white bg-opacity-50 p-3 rounded-lg">
                                    <strong>Motivo:</strong> Vacuna anual antirrábica y refuerzo
                                </p>
                                <div class="mt-3 p-3 bg-green-100 rounded-lg">
                                    <p class="text-sm text-green-800 flex items-center space-x-2">
                                        <i class="fas fa-info-circle"></i>
                                        <span><strong>Recordatorio:</strong> Llegar 15 minutos antes de la cita</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <button onclick="verDetalles(2)"
                                class="text-green-600 hover:text-green-700 p-2 hover:bg-green-50 rounded-lg transition-colors">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="cancelarCita(2)"
                                class="text-red-600 hover:text-red-700 p-2 hover:bg-red-50 rounded-lg transition-colors">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                Pre-Cita 3 - Cancelada 
                <div
                    class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition-all duration-200 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-l-red-400 opacity-75">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-times-circle text-red-600 text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-2">
                                    <h4 class="text-lg font-semibold text-gray-900">Emergencia - Max</h4>
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">Cancelada</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-3">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-calendar text-gray-400"></i>
                                        <span>12 Dic 2024</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-clock text-gray-400"></i>
                                        <span>14:00 PM</span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-700 bg-white bg-opacity-50 p-3 rounded-lg">
                                    <strong>Motivo:</strong> Problema digestivo urgente
                                </p>
                                <div class="mt-3 p-3 bg-red-100 rounded-lg">
                                    <p class="text-sm text-red-800 flex items-center space-x-2">
                                        <i class="fas fa-info-circle"></i>
                                        <span><strong>Motivo cancelación:</strong> Problema resuelto en casa</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <button onclick="reactivarCita(3)"
                                class="text-blue-600 hover:text-blue-700 p-2 hover:bg-blue-50 rounded-lg transition-colors">
                                <i class="fas fa-redo"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

            </div>

        </div>
    </div>
</div>
