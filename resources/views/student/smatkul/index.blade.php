@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('student.smatkul.create') }}" class="btn btn-primary">Ajukan Surat Keterangan Mata Kuliah</a>
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
                @forelse ($smatkulList as $index => $surat)
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
                            @if ($surat->pdf_file)
                                <a href="{{ asset('storage/' . $surat->pdf_file) }}" target="_blank">Lihat File</a>
                            @else
                                <em>Belum tersedia</em>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada pengajuan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
