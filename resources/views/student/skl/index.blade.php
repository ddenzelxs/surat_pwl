@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Surat Keterangan Lulus</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Surat</li>
                <li class="breadcrumb-item active">Keterangan Lulus</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center pt-3">
                <h5 class="card-title">Daftar Pengajuan Surat Keterangan Lulus</h5>
                <a href="{{ route('student.skl.create') }}" class="btn btn-primary">Ajukan Surat</a>
            </div>

            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lulus</th>
                            <th>Status</th>
                            <th>File PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sklList as $index => $skl)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $skl->nama_lengkap }}</td>
                                <td>{{ $skl->tanggal_lulus }}</td>
                                <td>
                                    @if ($skl->status == 0)
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($skl->status == 1)
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($skl->status == 2)
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-primary">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($skl->status == 2 && $skl->keterangan_penolakan)
                                        <span class="text-danger d-block mt-1"><strong>Alasan:</strong>
                                            {{ $skl->keterangan_penolakan }}</span>
                                    @elseif ($skl->status == 3)
                                        <a href="{{ asset('storage/' . $skl->pdf_file) }}" target="_blank">Lihat File</a>
                                    @else
                                        <em>Belum tersedia</em>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- End table-responsive -->
        </div>
    </div><!-- End card -->
@endsection
