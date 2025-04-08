@extends('layouts.index')

@section('content')
    <h1 class="mb-4">Ajukan Surat Mahasiswa Aktif Mata Kuliah</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('student.smatkul.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="surat_tujuan" class="form-label">Tujuan Surat</label>
            <input type="text" class="form-control" id="surat_tujuan" name="surat_tujuan" required>
        </div>

        <div class="mb-3">
            <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_mata_kuliah" name="nama_mata_kuliah" required>
        </div>

        <div class="mb-3">
            <label for="kode_mata_kuliah" class="form-label">Kode Mata Kuliah</label>
            <input type="text" class="form-control" id="kode_mata_kuliah" name="kode_mata_kuliah" required>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester" required>
        </div>

        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan Pengambilan Mata Kuliah</label>
            <textarea class="form-control" id="tujuan" name="tujuan" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="topik" class="form-label">Topik Mata Kuliah</label>
            <textarea class="form-control" id="topik" name="topik" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>
        <a href="{{ route('student.smatkul.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
