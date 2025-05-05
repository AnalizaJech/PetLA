<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Detalles de la Mascota</h2>

        @if($pet->image)
            <img src="data:image/jpeg;base64,{{ base64_encode($pet->image) }}" class="rounded w-40 h-40 object-cover mb-4">
        @endif

        <p><strong>Nombre:</strong> {{ $pet->name }}</p>
        <p><strong>Especie:</strong> {{ $pet->species }}</p>
        <p><strong>Raza:</strong> {{ $pet->breed }}</p>
        <p><strong>Fecha de Nacimiento:</strong> {{ $pet->birthdate }}</p>
        <p><strong>Género:</strong> {{ $pet->gender }}</p>
        <p><strong>Dueño:</strong> {{ $pet->owner->name }} {{ $pet->owner->lastname }}</p>

        <a href="{{ route('pets.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
    </div>
</x-app-layout>
