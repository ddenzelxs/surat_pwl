@extends('layouts.index')

@section('content')
<div class="container mt-2">
    <h3>Ajukan Surat Keterangan Mahasiswa Aktif</h3>

    @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('student.smahaktif.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nrp_nip" class="form-label">NRP / NIP</label>
            <input type="text" class="form-control" value="{{ Auth::user()->nrp_nip }}" readonly>
        </div>

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" value="{{ Auth::user()->nama_lengkap }}" readonly>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="number" name="semester" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="keperluan_pengajuan" class="form-label">Keperluan</label>
            <textarea name="keperluan_pengajuan" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>
        <a href="{{ route('student.smahaktif.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
