{{-- resources/views/owners/index.blade.php --}}
<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Lista de Dueños</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 rounded p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('owners.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Dueño</a>

        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4">DNI</th>
                    <th class="py-2 px-4">Nombre</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Teléfono</th>
                    <th class="py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($owners as $owner)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $owner->dni }}</td>
                    <td class="py-2 px-4">{{ $owner->name }} {{ $owner->lastname }}</td>
                    <td class="py-2 px-4">{{ $owner->email }}</td>
                    <td class="py-2 px-4">{{ $owner->phone }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('owners.show', $owner) }}" class="text-blue-500">Ver</a> |
                        <a href="{{ route('owners.edit', $owner) }}" class="text-yellow-500">Editar</a> |
                        <form action="{{ route('owners.destroy', $owner) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
