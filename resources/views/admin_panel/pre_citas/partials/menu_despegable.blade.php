<!-- Menú desplegable -->
<div x-show="open" @click.away="open = false"
    class="absolute right-20 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10 py-1">

    @if($precita->estado == "pendiente")
    <!-- Procesar Precita -->
    <button @click="openModal = true; open = false"
        class="flex items-center px-4 py-2 text-sm text-green-600 hover:bg-gray-100">
        <i class="fas fa-cogs mr-2"></i> Procesar Precita
    </button>
    @endif
    <!-- Llamar Cliente -->
    <a href="tel:{{ $precita->mascota->usuario->telefono ?? '' }}"
        class="flex items-center px-4 py-2 text-sm text-green-700 hover:bg-gray-100">
        <i class="fas fa-phone-alt mr-2"></i> Llamar Cliente
    </a>
    <!-- Enviar Gmail -->
    <a href="mailto:{{ $precita->mascota->usuario->email ?? '' }}"
        class="flex items-center px-4 py-2 text-sm text-yellow-600 hover:bg-gray-100">
        <i class="fas fa-envelope mr-2"></i> Enviar Gmail
    </a>
</div>
