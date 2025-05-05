<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Lista de Mascotas</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('pets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Registrar Mascota</a>

        <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Dueño</th>
        <th>Especie</th>
        <th>Raza</th>
        <th>Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ($pets as $pet)
        <tr>
            <td>
                @if ($pet->image)
                    <img src="data:image/jpeg;base64,{{ base64_encode($pet->image) }}"
                         alt="Mascota"
                         class="w-12 h-12 object-cover rounded-full border shadow">
                @else
                    <span class="text-gray-400 italic text-sm">Sin foto</span>
                @endif
            </td>
            <td>{{ $pet->name }}</td>
            <td>{{ $pet->owner->name }}</td>
            <td>{{ $pet->species }}</td>
            <td>{{ $pet->breed }}</td>
            <td>
                <a href="{{ route('pets.show', $pet) }}" class="text-blue-500 hover:underline">Ver</a>
                |
                <a href="{{ route('pets.edit', $pet) }}" class="text-yellow-500 hover:underline">Editar</a>
                |
                <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar?')" class="text-red-500 hover:underline">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
</x-app-layout>
