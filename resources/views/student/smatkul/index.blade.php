@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Surat Mata Kuliah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Surat</li>
                <li class="breadcrumb-item active">Mata Kuliah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center pt-3">
                <h5 class="card-title">Daftar Pengajuan Surat Keterangan Mata Kuliah</h5>
                <a href="{{ route('student.smatkul.create') }}" class="btn btn-primary">Ajukan Surat</a>
            </div>

            
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tujuan Surat</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Kode</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>File PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($smatkulList as $index => $surat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $surat->surat_tujuan }}</td>
                                <td>{{ $surat->nama_mata_kuliah }}</td>
                                <td>{{ $surat->kode_mata_kuliah }}</td>
                                <td>{{ $surat->semester }}</td>
                                <td>
                                    @if ($surat->status == 0)
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif ($surat->status == 1)
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($surat->status == 2)
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-primary">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($smatkul->status == 2 && $smatkul->keterangan_penolakan)
                                        <span class="text-danger d-block mt-1"><strong>Alasan:</strong>
                                            {{ $smatkul->keterangan_penolakan }}</span>
                                    @elseif ($smatkul->status == 3)
                                        <a href="{{ asset('storage/' . $smatkul->pdf_file) }}" target="_blank">Lihat File</a>
                                    @else
                                        <em>Belum tersedia</em>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>
    </div><!-- End card -->
@endsection
