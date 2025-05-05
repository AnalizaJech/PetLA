<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Registrar Nueva Mascota</h2>

        <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('pets.form', ['pet' => new App\Models\Pet, 'action' => 'Registrar'])
        </form>
    </div>
</x-app-layout>
