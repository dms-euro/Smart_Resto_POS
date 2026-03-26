<script>
function confirmDelete(options) {
    const {
        id = null,
        formId = null,
        title = 'Hapus Data?',
        text = 'Data tidak bisa dikembalikan!',
        confirmText = 'Ya, hapus!',
        cancelText = 'Batal'
    } = options;

    Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        iconColor: '#b48b5a',
        showCancelButton: true,
        confirmButtonColor: '#7aa57a',
        cancelButtonColor: '#8b7a6b',
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        background: '#ffffff',
        customClass: {
            popup: 'rounded-2xl border border-[#e5d9d0]',
            title: 'text-[#3d332b]',
            htmlContainer: 'text-[#6b5b4c]'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            if (formId) {
                document.getElementById(formId).submit();
            } else if (id) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    });
}
</script>
