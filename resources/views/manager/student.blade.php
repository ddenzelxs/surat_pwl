@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Mahasiswa</h5>
                <a href="{{ route('manager.create') }}" class="btn btn-primary rounded-pill">
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
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->nrp_nip }}</td> <!-- Use nrp_nip instead of id -->
                            <td>{{ $student->nama_lengkap }}</td> <!-- Use nama_lengkap instead of name -->
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->prodi->nama_prodi ?? '-' }}</td>
                            <td>{{ $student->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                              <a href="{{ route('manager.edit', $student->nrp_nip) }}" class="btn btn-sm btn-warning">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                          
                              <form action="{{ route('manager.destroy', $student->nrp_nip) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-sm btn-danger" type="submit">
                                      <i class="fa fa-trash"></i> Delete
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
