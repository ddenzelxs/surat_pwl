@extends('layouts.index')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form</h5>

      <form class="row g-3" action="{{ route('manager.store') }}" method="POST">
        @csrf
        <div class="col-12">
            <label for="nrp_nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nrp_nip" name="nrp_nip" maxlength="20" value="{{ old('nrp_nip') }}" required autofocus>
        </div>
        <div class="col-12">
            <label for="nama_lengkap" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" maxlength="100" value="{{ old('nama_lengkap') }}" required>
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="100" value="{{ old('email') }}" required>
        </div>
        <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" maxlength="255" required>
        </div>
        <div class="col-12">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="">Pilih Role</option>
                <option value="0">Mahasiswa</option>
                <option value="1">Dosen</option>
                <option value="2">Kepala Program Studi</option>
                <option value="3">Manajer Operasional</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>    
    </div>
  </div>
@endsection