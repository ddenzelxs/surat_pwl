@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('student.lhs.create') }}" class="btn btn-primary">Ajukan Laporan Hasil Studi</a>
        </div>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>File PDF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lhsList as $index => $lhs)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $lhs->nama_lengkap }}</td>
                        <td>{{ $lhs->keperluan_pembuatan_laporan }}</td>
                        <td>
                            @if ($lhs->status == 0)
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif ($lhs->status == 1)
                                <span class="badge bg-success">Disetujui</span>
                            @elseif ($lhs->status == 2)
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-primary">Selesai</span>
                            @endif
                        </td>
                        <td>
                            @if ($lhs->pdf_file)
                                <a href="{{ asset('storage/' . $lhs->pdf_file) }}" target="_blank">Lihat File</a>
                            @else
                                <em>Belum tersedia</em>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
