<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Editar Dueño</h2>

        <form action="{{ route('owners.update', $owner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('owners.form', ['owner' => $owner, 'action' => 'Actualizar'])
        </form>
    </div>
</x-app-layout>
