@extends('layouts.index')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit User</h5>

            <form class="row g-3" action="{{ route('manager.update', $user->nrp_nip) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="nrp_nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nrp_nip" name="nrp_nip" value="{{ $user->nrp_nip }}"
                        readonly>
                </div>

                <div class="col-12">
                    <label for="nama_lengkap" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}" readonly>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password (Kosongkan jika tidak ingin diubah)</label>
                    <input type="password" class="form-control" id="password" name="password" maxlength="255">
                </div>

                <div class="col-12">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="role_id" class="form-label">Role</label>
                    <input class="form-control" value="{{ $user->role->nama_role }}" readonly>
                </div>

                <input type="hidden" class="form-control" id="role_id" name="role_id" value="{{ $user->role_id}}">

                <div class="col-12">
                    <label for="prodi_id" class="form-label">Program Studi</label>
                    <input class="form-control" value="{{ $user->prodi->nama_prodi }}" readonly>
                </div>

                <input type="hidden" class="form-control" id="prodi_id" name="prodi_id" value="{{ $user->prodi_id}}">


                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('manager.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection