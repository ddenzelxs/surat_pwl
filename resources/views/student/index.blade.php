@extends('layouts.index')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Students</li>
      </ol>
    </nav>  
  </div><!-- End Page Title -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Students</h5>
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
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->nrp_nip }}</td>
                        <td>{{ $student->nama_lengkap }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
          <!-- End Table with hoverable rows -->    
    </div>
</div>
@endsection
