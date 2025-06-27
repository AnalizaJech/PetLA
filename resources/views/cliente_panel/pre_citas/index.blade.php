<x-app-layout>
    <!-- Contenido Principal -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Solicitar Cita</h2>
            <p class="text-gray-600 mt-1">Agenda una cita previa para tu mascota de forma rápida y sencilla</p>
        </div>

        <!-- Layout Principal: Formulario + Lista -->
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            <!-- Panel Izquierdo: Formulario de Solicitud -->
            @include("cliente_panel.pre_citas.partials.form")
            <!-- Panel Derecho: Lista de Pre-Citas -->
            @include("cliente_panel.pre_citas.partials.list")
            
        </div>
    </section>
</x-app-layout>
