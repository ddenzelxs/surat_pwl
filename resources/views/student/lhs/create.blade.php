@extends('layouts.index')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Ajukan Laporan Hasil Studi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('student.lhs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="keperluan_pembuatan_laporan" class="form-label">Keperluan Pembuatan Laporan</label>
            <textarea name="keperluan_pembuatan_laporan" class="form-control" rows="4" required>{{ old('keperluan_pembuatan_laporan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
