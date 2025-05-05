{{-- resources/views/owners/create.blade.php --}}
<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Registrar Nuevo Dueño</h2>

        <form action="{{ route('owners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('owners.form', ['owner' => new App\Models\Owner, 'action' => 'Crear'])

        </form>
    </div>
</x-app-layout>
