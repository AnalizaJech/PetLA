<div class="space-y-4">
    <input type="text" name="dni" placeholder="DNI" value="{{ old('dni', $owner->dni) }}" required class="w-full border rounded p-2">
    @error('dni') <p class="text-red-500">{{ $message }}</p> @enderror

    <input type="text" name="name" placeholder="Nombre" value="{{ old('name', $owner->name) }}" required class="w-full border rounded p-2">
    @error('name') <p class="text-red-500">{{ $message }}</p> @enderror

    <input type="text" name="lastname" placeholder="Apellido" value="{{ old('lastname', $owner->lastname) }}" required class="w-full border rounded p-2">
    @error('lastname') <p class="text-red-500">{{ $message }}</p> @enderror

    <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email', $owner->email) }}" required class="w-full border rounded p-2">
    @error('email') <p class="text-red-500">{{ $message }}</p> @enderror

    <input type="text" name="phone" placeholder="Teléfono" value="{{ old('phone', $owner->phone) }}" required class="w-full border rounded p-2">
    @error('phone') <p class="text-red-500">{{ $message }}</p> @enderror

    <input type="text" name="address" placeholder="Dirección" value="{{ old('address', $owner->address) }}" required class="w-full border rounded p-2">
    @error('address') <p class="text-red-500">{{ $message }}</p> @enderror

    <input type="file" name="image" class="w-full border rounded p-2">
    @error('image') <p class="text-red-500">{{ $message }}</p> @enderror

    <div class="flex gap-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ $action }}</button>
        <a href="{{ route('owners.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">Cancelar</a>
    </div>
</div>
