@extends('layouts.index')

@section('content')

<div class="pagetitle">
    <h1>Users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Dosen</li>
      </ol>
    </nav>  
  </div><!-- End Page Title -->
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Dosen</h5>
            <a href="{{ route('manager.create') }}" class="btn btn-primary rounded-pill">
                <i class="fa fa-plus"></i>
                Add Data
            </a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NIP</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lecturers as $lecturers)
                    <tr>
                        <td>{{ $lecturers->nrp_nip }}</td> <!-- Use nrp_nip instead of id -->
                        <td>{{ $lecturers->nama_lengkap }}</td> <!-- Use nama_lengkap instead of name -->
                        <td>{{ $lecturers->email }}</td>
                        <td>{{ $lecturers->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
          <!-- End Table with hoverable rows -->    
    </div>
</div>
@endsection