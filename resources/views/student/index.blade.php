@extends('layouts.index')

@section('content')
    <div class="container mt-3">
        {{-- Flash success alert --}}
        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        {{-- Konten lainnya bisa kamu taruh di sini --}}
        <h3>Selamat datang di halaman mahasiswa</h3>
    </div>
@endsection
