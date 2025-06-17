<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Panel del {{ Auth::user()->role}}</h2>
    </x-slot>
    @if(Auth::user()->role == "admin")
        <h2>solo visible para el admin</h2>
    @endif

    @if(Auth::user()->role == "veterinario")
        <h2>solo visible para veterinarion</h2>
    @endif
    <h1></h1>
    <div class="p-4">Bienvenido, {{Auth::user()->name}}</div>
</x-app-layout>
