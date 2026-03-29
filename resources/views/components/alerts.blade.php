<script>
document.addEventListener('DOMContentLoaded', function () {

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,

        customClass: {
            popup: 'rounded-xl border border-[#e5d9d0]',
            title: 'text-[#3d332b] font-semibold',
            htmlContainer: 'text-[#6b5b4c]',
        }
    });

    // SUCCESS
    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            iconColor: '#7aa57a',
            background: '#f6fbf6'
        });
    @endif

    // ERROR
    @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            iconColor: '#d9534f',
            background: '#fdf2f2'
        });
    @endif

    // INFO
    @if(session('info'))
        Toast.fire({
            icon: 'info',
            title: '{{ session('info') }}',
            iconColor: '#b48b5a',
            background: '#fdf8f3'
        });
    @endif

});
</script>
