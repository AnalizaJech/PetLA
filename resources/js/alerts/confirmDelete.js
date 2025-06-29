window.alertDelete = function confirmDelete(formId, titulo) {
    Swal.fire({
        title: `¿Esta seguro de eliminar ${titulo} ?`,
        text: 'Esta acción es permanente',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
}
