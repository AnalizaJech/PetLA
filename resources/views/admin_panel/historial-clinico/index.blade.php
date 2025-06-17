<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Panel del {{ Auth::user()-> role}} </h2>
    </x-slot>
    <div class="p-4">historial_clinico</div>
</x-app-layout>