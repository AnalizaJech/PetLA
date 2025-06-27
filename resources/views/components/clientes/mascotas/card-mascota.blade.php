<!-- Card Mascota -->
<div
    class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
    <!-- Imagen de la Mascota -->
    <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600">
        <img src="{{ $foto ? asset('storage/' . $foto) : 'https://png.pngtree.com/png-clipart/20230924/original/pngtree-dog-icon-logo-illustration-template-pet-animal-art-vector-png-image_12850819.png' }}"
            alt={{ $nombre }} class="object-cover w-full h-full">
        <div class="absolute top-3 left-3">
            <div class="bg-white bg-opacity-90 p-2 rounded-full">
                <i class="fas fa-paw text-blue-600"></i>
            </div>
        </div>
    </div>

    <!-- Información de la Mascota -->
    <div class="p-6">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-xl font-bold text-gray-900">{{ $nombre }}</h3>
            <div class="flex space-x-2">
                <button
                    onclick="showModal(this)"
                    data-id="{{$id}}"
                    data-name="{{$nombre}}"
                    data-especie="{{$especie}} "
                    data-raza="{{$raza}}"
                    data-nacimiento="{{$nacimiento}}" 
                    data-fotourl="{{ $foto ? asset('storage/' . $foto) : 'https://png.pngtree.com/png-clipart/20230924/original/pngtree-dog-icon-logo-illustration-template-pet-animal-art-vector-png-image_12850819.png'}}"
                    data-action="{{ route('mascotas.update', $id) }}"
                    
                    class="text-blue-600 hover:text-blue-700 p-2 hover:bg-blue-50 rounded-lg transition-colors">
                    <i class="fas fa-edit"></i>
                </button>
                <form  id="form-delete-{{ $id }}" action="{{route("mascotas.destroy", $id)}}" method="POST">
                    @csrf
                    @method("DELETE")

                    <button 
                        type="button"
                        onclick="confirmDelete({{$id}})"
                        class="text-red-600 hover:text-red-700 p-2 hover:bg-red-50 rounded-lg transition-colors">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-2 mb-4">
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-check-circle mr-3 text-green-500"></i>
                <span>Especie: {{ $especie }}</span>
            </div>
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-check-circle mr-3 text-green-500"></i>
                <span>Raza: {{ $raza }}</span>
            </div>
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-check-circle mr-3 text-green-500"></i>
                <span>{{ \Carbon\Carbon::parse($nacimiento)->locale('es')->diffForHumans(null, true) }}</span>
            </div>
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-birthday-cake w-4 text-center mr-3 text-pink-500"></i>
                <span>{{ $nacimiento }}</span>
            </div>
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-weight w-4 text-center mr-3 text-purple-500"></i>
                <span>28 kg</span>
            </div>
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-mars w-4 text-center mr-3 text-blue-500"></i>
                <span>Macho</span>
            </div>
        </div>

        <!-- Próxima Cita -->
        <div class="bg-blue-50 p-3 rounded-lg mb-4">
            <div class="flex items-center text-sm">
                <i class="fas fa-calendar-check text-blue-600 mr-2"></i>
                <span class="text-blue-800 font-medium">Próxima cita: 15 Dic 2024</span>
            </div>
        </div>

        <!-- Botones de Acción -->
        <div class="flex space-x-2">
            <button 
                class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-3 rounded-lg text-sm font-medium transition-colors">
                <i class="fas fa-history mr-1"></i>
                Historial
            </button>
            <button 
                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors">
                <i class="fas fa-calendar-plus mr-1"></i>
                Cita
            </button>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Está seguro de eliminar la mascota?',
            text: "Esta acción es permanente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
        }).then((result) => {
            if (result.isConfirmed) {
                
            document.getElementById('form-delete-' + id).submit();
            }
        });
    }

    function showModal(btn){
        document.getElementById('modalEditMiMascota').classList.remove('hidden');
        
        // pasar data al modal
        document.getElementById('mascotaName').value=btn.dataset.name;
        document.getElementById('mascotaEspecie').value=btn.dataset.especie;
        document.getElementById('mascotaRaza').value=btn.dataset.raza;
        document.getElementById('mascotaNacimiento').value=btn.dataset.nacimiento;
        
        document.getElementById('preview').src = btn.dataset.fotourl  ;
        const form = document.getElementById('formEditMiMascota');
        form.action = btn.dataset.action; 
        
    }

    function closeModal(){
        document.getElementById('modalEditMiMascota').classList.add('hidden');
    }
</script>