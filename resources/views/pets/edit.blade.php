<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Editar Mascota</h2>

        <form action="{{ route('pets.update', $pet) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('pets.form', [
    'pet' => $pet,
    'action' => 'Actualizar',
    'speciesList' => $speciesList,
    'breedList' => $breedList,
])

        </form>
    </div>
</x-app-layout>
