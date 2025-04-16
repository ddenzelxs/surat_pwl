@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Surat Mahasiswa Aktif</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Surat</li>
                <li class="breadcrumb-item active">Mahasiswa Aktif</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center pt-3">
                <h5 class="card-title">Daftar Pengajuan Surat Keterangan Mahasiswa Aktif</h5>
                <a href="{{ route('student.smahaktif.create') }}" class="btn btn-primary">Ajukan Surat</a>
            </div>

            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Semester</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>File PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($smahaktifList as $index => $smahaktif)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $smahaktif->semester }}</td>
                                <td>{{ $smahaktif->keperluan_pengajuan }}</td>
                                <td>
                                    @if ($smahaktif->status == 0)
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif ($smahaktif->status == 1)
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($smahaktif->status == 2)
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-primary">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($smahaktif->status == 2 && $smahaktif->keterangan_penolakan)
                                        <span class="text-danger d-block mt-1"><strong>Alasan:</strong>
                                            {{ $smahaktif->keterangan_penolakan }}</span>
                                    @elseif ($smahaktif->status == 3)
                                        <a href="{{ asset('storage/' . $smahaktif->pdf_file) }}" target="_blank">Lihat File</a>
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
