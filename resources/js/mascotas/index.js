import Swal from "sweetalert2";

function showImageModal(base64) {
    document.getElementById('modalImage').src = 'data:image/jpeg;base64,' + base64;
    document.getElementById('imageModal').classList.remove('hidden');
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
}


/* 
document.addEventListener('DOMContentLoaded', () => {
    const button = document.getElementById("delete_mascota");
    button.addEventListener('click', function () {
            const id = this.dataset.id;
            confirmDelete(id);
        });
})

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
} */



document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#mascotaTable tbody tr');

    rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});