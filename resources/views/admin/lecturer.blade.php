@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Kepala Program Studi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Kepala Program Studi</h5>
                <a href="{{ route('admin.create') }}" class="btn btn-primary rounded-pill">
                    <i class="fa fa-plus"></i>
                    Add Data
                </a>
            </div>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lecturers as $lecturer)
                        <tr>
                            <td>{{ $lecturer->nrp_nip }}</td> <!-- Use nrp_nip instead of id -->
                            <td>{{ $lecturer->nama_lengkap }}</td> <!-- Use nama_lengkap instead of name -->
                            <td>{{ $lecturer->email }}</td>
                            <td>{{ $lecturer->prodi->nama_prodi ?? '-' }}</td>
                            <td>{{ $lecturer->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $lecturer->nrp_nip) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('admin.toggleStatus', $lecturer->nrp_nip) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $lecturer->status ? 'btn-outline-danger' : 'btn-outline-success' }}">
                                        <i class="bi {{ $lecturer->status ? 'bi-toggle-off' : 'bi-toggle-on' }}"></i>
                                        {{ $lecturer->status ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with hoverable rows -->
        </div>
    </div>
@endsection
