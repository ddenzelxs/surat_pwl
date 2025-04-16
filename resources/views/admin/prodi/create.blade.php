@extends('layouts.index')

@section('content')
<div class="pagetitle">
    <h1>Tambah Program Studi</h1>
</div>

<div class="card">
    <div class="card-body pt-3">
        <form action="{{ route('prodi.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="id" class="form-label">id Program Studi</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id" value="{{ old('id') }}" required>
                @error('id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" name="nama_prodi" id="nama_prodi" value="{{ old('nama_prodi') }}" required>
                @error('nama_prodi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
