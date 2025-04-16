@extends('layouts.index')

@section('content')
<div class="pagetitle">
    <h1>Daftar Program Studi</h1>
</div>

<div class="card">
    <div class="card-body pt-3">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('prodi.create') }}" class="btn btn-primary">Tambah Program Studi</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Program Studi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prodis as $index => $prodi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $prodi->nama_prodi }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Belum ada program studi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>
@endpush
