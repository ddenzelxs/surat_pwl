@extends('layouts.index')

@section('content')
<div class="pagetitle">
    <h1>Dashboard Admin</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="row">
    <!-- Total Users -->
    <div class="col-md-3">
        <div class="card info-card">
            <div class="card-body">
                <h5 class="card-title">Total User</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $totalUsers }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Mahasiswa -->
    <div class="col-md-3">
        <div class="card info-card">
            <div class="card-body">
                <h5 class="card-title">Total Mahasiswa</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $totalMahasiswa }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Dosen -->
    <div class="col-md-3">
        <div class="card info-card">
            <div class="card-body">
                <h5 class="card-title">Total Dosen</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle bg-warning text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $totalDosen }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Prodi -->
    <div class="col-md-3">
        <div class="card info-card">
            <div class="card-body">
                <h5 class="card-title">Total Program Studi</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle bg-danger text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $totalProdi }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
