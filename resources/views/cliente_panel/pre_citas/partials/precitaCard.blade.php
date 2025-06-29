@php
    $estilos = [
        'pendiente' => [
            'bg' => 'from-yellow-50 to-orange-50 border-l-4 border-l-yellow-400',
            'icon' => 'fas fa-clock text-yellow-600 text-lg',
            'icon_bg' => 'bg-yellow-100',
            'status' => 'bg-yellow-100 text-yellow-800',
        ],
        'aprobado' => [
            'bg' => 'from-green-50 to-emerald-50 border-l-4 border-l-green-400',
            'icon' => 'fas fa-check-circle text-green-600 text-lg',
            'icon_bg' => 'bg-green-100',
            'status' => 'bg-green-100 text-green-800',
        ],
        'rechazado' => [
            'bg' => 'from-red-50 to-pink-50 border-l-4 border-l-red-400',
            'icon' => 'fas fa-times-circle text-red-600 text-lg',
            'icon_bg' => 'bg-red-100',
            'status' => 'bg-red-100 text-red-800',
        ],
    ];

    $estado = $precita->estado;
    $bg = $estilos[$estado]['bg'];
    $icono = $estilos[$estado]['icon'];
    $bg_coloricon = $estilos[$estado]['icon_bg'];
    $status_color = $estilos[$estado]['status'];

@endphp

<!-- Pre Cita Card-->
<div
    class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition-all duration-200 bg-gradient-to-r {{ $bg }}">
    <div class="flex items-start justify-between">
        <div class="flex items-start space-x-4">
            <div class="w-12 h-12 {{ $bg_coloricon }} rounded-full flex items-center justify-center">
                <i class="{{ $icono }}"></i>
            </div>
            <div class="flex-1">
                <div class="flex items-center space-x-2 mb-2">
                    <h4 class="text-lg font-semibold text-gray-900">{{ $precita->mascota->nombre }}</h4>
                    <span
                        class=" {{ $status_color }} text-xs font-medium px-2.5 py-1 rounded-full capitalize">{{ $precita->estado }}</span>
                </div>
                <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-3">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-calendar text-gray-400"></i>
                        <span>{{ $precita->fecha_solicitada }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-clock text-gray-400"></i>
                        <span>{{ $precita->rango_hora }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-paw text-gray-400"></i>
                        <span>{{ $precita->mascota->especie}}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-paw text-gray-400"></i>
                        <span>{{ $precita->mascota->raza }}</span>
                    </div>
                </div>
                <p class="text-sm text-gray-700 bg-white bg-opacity-50 p-3 rounded-lg">
                    <strong>Motivo:</strong> {{ $precita->motivo }}
                </p>
                <p class="text-sm text-gray-700 bg-white bg-opacity-50 p-3 rounded-lg">
                    <strong>Observaciones:</strong> {{ $precita->observaciones ?? 'Sin Observaciones' }}
                </p>
            </div>
        </div>

        <!-- Acciones -->
        <div class="flex flex-col space-y-2">

            @switch($precita->estado)
                @case('aprobado')
                    <button class="text-green-600 hover:text-green-700 p-2 hover:bg-green-50 rounded-lg transition-colors">
                        <i class="fas fa-eye"></i>
                    </button>
                @break

                @case('pendiente')
                    <button class="text-blue-600 hover:text-blue-700 p-2 hover:bg-blue-50 rounded-lg transition-colors">
                        <i class="fas fa-edit"></i>
                    </button>
                @break
            @endswitch

            <form id="delete-precita-{{ $precita->id }}" action="{{ route('precitas.destroy', $precita->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="alertDelete('delete-precita-{{ $precita->id }}','la pre cita')"
                    class="text-red-600 hover:text-red-700 p-2 hover:bg-red-50 rounded-lg transition-colors">
                    <i class="fas fa-trash"></i>
                </button>
            </form>

        </div>
    </div>
</div>


