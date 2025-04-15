@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Laporan Hasil Studi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pengajuan</li>
                <li class="breadcrumb-item active">Laporan Hasil Studi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title pt-3">Daftar Pengajuan Laporan Hasil Studi</h5>

            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NRP</th>
                            <th>Nama Mahasiswa</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lhsList as $index => $lhs)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lhs->nrp_nip }}</td>
                                <td>{{ $lhs->nama_lengkap }}</td>
                                <td>{{ $lhs->keperluan_pembuatan_laporan }}</td>
                                <td>
                                    @if ($lhs->status == 0)
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif ($lhs->status == 1)
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($lhs->status == 2)
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-primary">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('manager.lhs.sendPdf', $lhs->id) }}" method="POST"
                                        enctype="multipart/form-data" class="d-flex flex-column gap-1">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" name="pdf_file" accept="application/pdf" required
                                            class="form-control form-control-sm">
                                        <button type="submit" class="btn btn-success btn-sm mt-1">Kirim PDF</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- End table-responsive -->
        </div>
    </div><!-- End card -->
@endsection
