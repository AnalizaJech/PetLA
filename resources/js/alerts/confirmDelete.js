function confirmDelete(formId, titulo = '¿Está seguro de eliminar?', texto = 'Esta acción es permanente') {
    Swal.fire({
        title: titulo,
        text: texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
}
