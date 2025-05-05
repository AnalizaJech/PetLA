<script>
    function autocomplete({ value = '', options = [] }) {
        return {
            search: value,
            options: options,
            filtered: [],
            show: false,
            filterOptions() {
                this.filtered = this.options.filter(option =>
                    option.toLowerCase().includes(this.search.toLowerCase())
                );
            },
            selectOption(option) {
                this.search = option;
                this.show = false;
            }
        };
    }
</script>



<div class="space-y-4">
    <select name="owner_id" class="w-full border rounded p-2" required>
        <option value="">Selecciona un dueño</option>
        @foreach($owners as $owner)
            <option value="{{ $owner->id }}" {{ old('owner_id', $pet->owner_id ?? '') == $owner->id ? 'selected' : '' }}>
                {{ $owner->name }} {{ $owner->lastname }}
            </option>
        @endforeach
    </select>
    @error('owner_id') <p class="text-red-500">{{ $message }}</p> @enderror

    <input type="text" name="name" placeholder="Nombre" value="{{ old('name', $pet->name) }}" class="w-full border rounded p-2" required>
    <label class="block text-sm font-medium text-gray-700 mt-4">Especie</label>
    <div x-data="autocomplete({ 
    value: @json(old('species', $pet->species ?? '')), 
    options: ['Perro', 'Gato', 'Conejo', 'Hámster', 'Ave', 'Tortuga', 'Erizo', 'Hurón', 'Reptil', 'Pez', 'Caballo', 'Cerdo miniatura', 'Otro'] 
})" class="relative">

    <input
        type="text"
        name="species"
        placeholder="Escribe o selecciona una especie"
        x-model="search"
        @input="filterOptions"
        @focus="filterOptions(); show = true"
        @keydown.escape="show = false"
        class="w-full border rounded p-2"
        autocomplete="off"
        required
    >
    <ul x-show="show && filtered.length"
        class="absolute z-10 bg-white border border-gray-300 mt-1 w-full max-h-40 overflow-y-auto rounded shadow"
    >
        <template x-for="(option, index) in filtered" :key="index">
            <li @click="selectOption(option)"
                class="px-4 py-2 hover:bg-blue-100 cursor-pointer"
                x-text="option"
            ></li>
        </template>
    </ul>
</div>



<label class="block text-sm font-medium text-gray-700 mt-4">Raza</label>
<div x-data="autocomplete({ 
    value: @json(old('breed', $pet->breed ?? '')), 
    options: ['Labrador Retriever', 'Pastor Alemán', 'Bulldog Francés', 'Chihuahua', 'Pug', 'Shih Tzu', 'Golden Retriever', 'Schnauzer', 'Doberman', 'Gato Persa', 'Gato Siamés', 'Gato Bengalí', 'Conejo Enano', 'Conejo Rex', 'Otro'] 
})" class="relative">

    <input
        type="text"
        name="breed"
        placeholder="Escribe o selecciona una raza"
        x-model="search"
        @input="filterOptions"
        @focus="filterOptions(); show = true"
        @keydown.escape="show = false"
        class="w-full border rounded p-2"
        autocomplete="off"
        required
    >
    <ul x-show="show && filtered.length"
        class="absolute z-10 bg-white border border-gray-300 mt-1 w-full max-h-40 overflow-y-auto rounded shadow"
    >
        <template x-for="(option, index) in filtered" :key="index">
            <li @click="selectOption(option)"
                class="px-4 py-2 hover:bg-blue-100 cursor-pointer"
                x-text="option"
            ></li>
        </template>
    </ul>
</div>





    <label class="block text-sm font-medium text-gray-700 mt-4">Fecha de nacimiento</label>
<input type="text" name="birthdate" id="birthdate"
       class="w-full border rounded p-2"
       placeholder="Selecciona una fecha" required>

    <select name="gender" class="w-full border rounded p-2" required>
        <option value="">Género</option>
        <option value="Macho" {{ old('gender', $pet->gender) == 'Macho' ? 'selected' : '' }}>Macho</option>
        <option value="Hembra" {{ old('gender', $pet->gender) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
    </select>

    <input type="file" name="image" class="w-full border rounded p-2">

    <div class="flex gap-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ $action }}</button>
        <a href="{{ route('pets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
    </div>
</div>


<script>
function autocomplete({ options }) {
    return {
        search: '',
        options,
        filtered: [],
        show: false,
        filterOptions() {
            const query = this.search.toLowerCase();
            this.filtered = this.options.filter(option =>
                option.toLowerCase().includes(query)
            );
        },
        selectOption(option) {
            this.search = option;
            this.show = false;
        }
    }
}
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#birthdate", {
            locale: FlatpickrEs,               // idioma
            dateFormat: "Y-m-d",               // formato yyyy-mm-dd
            maxDate: "today",                  // no permite fecha futura
            disableMobile: true,               // fuerza calendario nativo incluso en móvil
            altInput: true,                    // input alterno visible bonito
            altFormat: "d-m-Y",                // formato bonito
            wrap: false
        });
    });
</script>

