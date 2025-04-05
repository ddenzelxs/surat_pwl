<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Tampilkan pesan sukses dari session
    @if (session('status'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('status') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    // Tampilkan error validasi
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Gagal Menyimpan Data!',
            html: '{!! implode('<br>', $errors->all()) !!}',
        });
    @endif
</script>
