<script>
document.addEventListener('DOMContentLoaded', function () {

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        customClass: {
            popup: 'rounded-xl shadow-lg border border-[#e5d9d0]',
            title: 'text-[#3d332b] font-semibold',
            htmlContainer: 'text-[#6b5b4c]',
        }
    });
    
    // SUCCESS (Hijau Warung Daun)
    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            iconColor: '#7aa57a'
        });
    @endif

    // ERROR (Merah soft biar tetap elegan)
    @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            iconColor: '#d9534f'
        });
    @endif

    // INFO (Coklat earthy)
    @if(session('info'))
        Toast.fire({
            icon: 'info',
            title: '{{ session('info') }}',
            iconColor: '#b48b5a'
        });
    @endif

});
</script>
