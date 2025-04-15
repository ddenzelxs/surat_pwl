@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('student.skl.create') }}" class="btn btn-primary">Ajukan Surat Keterangan Lulus</a>
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
                @foreach ($sklList as $index => $skl)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $skl->nama_lengkap }}</td>
                        <td>{{ $skl->keperluan_pembuatan_laporan }}</td>
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
                            @if ($skl->pdf_file)
                                <a href="{{ asset('storage/' . $skl->pdf_file) }}" target="_blank">Lihat File</a>
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
