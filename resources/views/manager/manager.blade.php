@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Manager</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Manager</h5>
            </div>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($managers as $manager)
                        <tr>
                            <td>{{ $manager->nrp_nip }}</td> <!-- Use nrp_nip instead of id -->
                            <td>{{ $manager->nama_lengkap }}</td> <!-- Use nama_lengkap instead of name -->
                            <td>{{ $manager->email }}</td>
                            <td>{{ $manager->prodi->nama_prodi ?? '-' }}</td>
                            <td>{{ $manager->status == 1 ? 'Active' : 'Inactive' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with hoverable rows -->
        </div>
    </div>
@endsection
