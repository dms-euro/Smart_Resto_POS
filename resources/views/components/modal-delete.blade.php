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

        buttonsStyling: false,

        customClass: {
            popup: 'rounded-2xl border border-[#e5d9d0] p-6',
            title: 'text-[#3d332b] text-xl font-semibold',
            htmlContainer: 'text-[#6b5b4c] text-sm',

            confirmButton: 'bg-[#7aa57a] hover:bg-[#689268] text-white px-5 py-2 rounded-full text-sm font-medium transition',
            cancelButton: 'bg-gray-100 hover:bg-gray-200 text-[#5f4d40] px-5 py-2 rounded-full text-sm font-medium transition ml-2'
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
