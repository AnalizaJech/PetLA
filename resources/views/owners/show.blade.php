<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Detalles del Dueño</h2>

        @if ($owner->image)
            <img src="data:image/jpeg;base64,{{ base64_encode($owner->image) }}" class="rounded-full w-32 h-32 object-cover mb-4" />
        @endif

        <p><strong>DNI:</strong> {{ $owner->dni }}</p>
        <p><strong>Nombre:</strong> {{ $owner->name }} {{ $owner->lastname }}</p>
        <p><strong>Email:</strong> {{ $owner->email }}</p>
        <p><strong>Teléfono:</strong> {{ $owner->phone }}</p>
        <p><strong>Dirección:</strong> {{ $owner->address }}</p>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('owners.edit', $owner) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
            <a href="{{ route('owners.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
        </div>
    </div>
</x-app-layout>
