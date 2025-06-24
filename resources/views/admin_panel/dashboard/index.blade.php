<x-app-layout>
   
    @if(Auth::user()->role == "admin")
        <h2>solo visible para el admin</h2>
    @endif

    @if(Auth::user()->role == "veterinario")
        <h2>solo visible para veterinarion</h2>
    @endif
    <h1></h1>

    <div class="container mx-auto px-4 py-8">
    <!-- Título y Acciones Rápidas -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Bienvenido, {{Auth::user()->name}}- {{Auth::user()->role}}</h2>
                <p class="text-gray-600 mt-1">Resumen general de tu clínica veterinaria</p>
            </div>
            <div class="flex space-x-3 mt-4 sm:mt-0">
                <a href={{route("precitas.create")}} class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Nueva Cita</span>
                </a>
                <a href={{route("mascotas.index")}} class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center space-x-2">
                    <i class="fas fa-paw"></i>
                    <span>Nueva Mascota</span>
                </a>
            </div>
        </div>

        <!-- Tarjetas de Estadísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Mascotas -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Mascotas</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{$totalMascotas}}</p>
                        <p class="text-sm text-green-600 mt-1 flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i>
                            +12% este mes
                        </p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-paw text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Citas -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Citas</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{$totalCitas}}</p>
                        <p class="text-sm text-blue-600 mt-1 flex items-center">
                            <i class="fas fa-clock mr-1"></i>
                            {{$citasPendientes}} pendientes
                        </p>
            
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-calendar-check text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Ingresos Mes -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Ingresos del Mes</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">S/0,00</p>
                        <p class="text-sm text-green-600 mt-1 flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i>
                            +8.2% vs mes anterior
                        </p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-euro-sign text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Clientes  -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Clientes</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{$totalClientes}}</p>
                        <p class="text-sm text-purple-600 mt-1 flex items-center">
                            <i class="fas fa-users mr-1"></i>
                            +45 nuevos
                        </p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-users text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos y Tablas -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            
            <!-- Gráfico de Citas -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Citas por Mes</h3>
                    <div class="flex space-x-2">
                        <button class="text-sm text-gray-600 hover:text-gray-900 px-3 py-1 rounded-lg hover:bg-gray-100">7D</button>
                        <button class="text-sm bg-blue-100 text-blue-600 px-3 py-1 rounded-lg">30D</button>
                        <button class="text-sm text-gray-600 hover:text-gray-900 px-3 py-1 rounded-lg hover:bg-gray-100">90D</button>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="citasChart" height="100"></canvas>
                </div>
            </div>

            <!-- Distribución de Especies -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Especies Atendidas</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">Perros</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm font-medium text-gray-900">65%</span>
                            <div class="w-16 h-2 bg-gray-200 rounded-full">
                                <div class="w-10 h-2 bg-blue-500 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">Gatos</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm font-medium text-gray-900">28%</span>
                            <div class="w-16 h-2 bg-gray-200 rounded-full">
                                <div class="w-7 h-2 bg-green-500 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">Aves</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm font-medium text-gray-900">4%</span>
                            <div class="w-16 h-2 bg-gray-200 rounded-full">
                                <div class="w-1 h-2 bg-yellow-500 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">Otros</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm font-medium text-gray-900">3%</span>
                            <div class="w-16 h-2 bg-gray-200 rounded-full">
                                <div class="w-1 h-2 bg-purple-500 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Citas de Hoy y Actividad Reciente -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Citas de Hoy -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Citas de Hoy</h3>
                    <a href={{route("citas.index")}} class="text-sm text-blue-600 hover:text-blue-700 font-medium">Ver todas</a>
                </div>
                <div class="space-y-4">
                    @forelse($citasHoy as $cita)
                        <!-- Cita 1 -->
                        <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-paw text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">{{$cita->mascota->nombre}}</p>
                                <p class="text-xs text-gray-500">{{$cita->veterinario->name}} • {{$cita->fecha_hora}}</p>
                            </div>
                            @php
                                $colors= [
                                    'pendiente' => 'bg-yellow-100 text-yellow-800',
                                    'confirmado' => 'bg-green-100 text-green-800',
                                    'cancelado' => 'bg-red-100 text-red-800',
                                ];
                            @endphp
                            <span class="text-xs {{$colors[$cita->estado] ?? 'bg-gray-100 text-gray-800'}} px-2 py-1 rounded-full">
                                {{$cita->estado}}
                            </span>
                        </div>
                    @empty
                        <div class="text-gray-500 text-sm">No hay citas programadas para hoy.</div>
                    @endforelse
                </div>
            </div>

            <!-- Actividad Reciente -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Actividad Reciente</h3>
                    <button class="text-sm text-blue-600 hover:text-blue-700 font-medium">Ver historial</button>
                </div>
                <div class="space-y-4">
                    <!-- Actividad 1 -->
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mt-0.5">
                            <i class="fas fa-plus text-green-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Nueva mascota registrada</p>
                            <p class="text-xs text-gray-500">Toby (Perro) - Hace 2 horas</p>
                        </div>
                    </div>
                    
                    <!-- Actividad 2 -->
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mt-0.5">
                            <i class="fas fa-calendar text-blue-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Cita completada</p>
                            <p class="text-xs text-gray-500">Max - Revisión general - Hace 3 horas</p>
                        </div>
                    </div>
                    
                    <!-- Actividad 3 -->
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mt-0.5">
                            <i class="fas fa-user text-yellow-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Nuevo cliente registrado</p>
                            <p class="text-xs text-gray-500">Patricia Ruiz - Hace 5 horas</p>
                        </div>
                    </div>
                    
                    <!-- Actividad 4 -->
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mt-0.5">
                            <i class="fas fa-file-medical text-purple-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Historial médico actualizado</p>
                            <p class="text-xs text-gray-500">Luna - Vacuna antirrábica - Hace 1 día</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accesos Rápidos -->
        <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Accesos Rápidos</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href={{route("mascotas.index")}} class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors group">
                    <div class="w-12 h-12 bg-blue-100 group-hover:bg-blue-200 rounded-full flex items-center justify-center mb-2 transition-colors">
                        <i class="fas fa-paw text-blue-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Mascotas</span>
                </a>
                
                <a href={{route("citas.create")}} class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors group">
                    <div class="w-12 h-12 bg-green-100 group-hover:bg-green-200 rounded-full flex items-center justify-center mb-2 transition-colors">
                        <i class="fas fa-calendar-plus text-green-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Nueva Cita</span>
                </a>
                
                <a href={{route("duenos.index")}} class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors group">
                    <div class="w-12 h-12 bg-purple-100 group-hover:bg-purple-200 rounded-full flex items-center justify-center mb-2 transition-colors">
                        <i class="fas fa-users text-purple-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Clientes</span>
                </a>
                
                {{-- <button class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors group">
                    <div class="w-12 h-12 bg-yellow-100 group-hover:bg-yellow-200 rounded-full flex items-center justify-center mb-2 transition-colors">
                        <i class="fas fa-pills text-yellow-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Inventario</span>
                </button>
                
                <button class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors group">
                    <div class="w-12 h-12 bg-red-100 group-hover:bg-red-200 rounded-full flex items-center justify-center mb-2 transition-colors">
                        <i class="fas fa-chart-bar text-red-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Reportes</span>
                </button>
                
                <button class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors group">
                    <div class="w-12 h-12 bg-indigo-100 group-hover:bg-indigo-200 rounded-full flex items-center justify-center mb-2 transition-colors">
                        <i class="fas fa-cog text-indigo-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Configuración</span>
                </button> --}}
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    const ctx = document.getElementById('citasChart').getContext('2d');
    const citasChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Citas por Mes',
                data: {!! json_encode($data) !!},
                borderColor: 'rgba(59, 130, 246, 1)',
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { 
                    beginAtZero: true ,
                    ticks: {
                        stepSize: 1
                    }
                }
                
            }
        }
    });
</script>