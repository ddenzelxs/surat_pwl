@extends('layouts.index')

@section('content')
<div class="container mt-2">
    <h3>Ajukan Surat Keterangan Lulus</h3>

    @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('student.skl.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nrp_nip" class="form-label">NRP / NIP</label>
            <input type="text" class="form-control" id="nrp_nip" value="{{ Auth::user()->nrp_nip }}" readonly>
        </div>

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}" readonly>
        </div>

        <div class="mb-3">
            <label for="tanggal_lulus" class="form-label">Tanggal Lulus</label>
            <input type="date" name="tanggal_lulus" id="tanggal_lulus" class="form-control" required>
            @error('tanggal_lulus')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>
        <a href="{{ route('student.skl.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
