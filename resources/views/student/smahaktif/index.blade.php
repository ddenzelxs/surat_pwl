@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('student.smahaktif.create') }}" class="btn btn-primary">Ajukan Surat Keterangan Mahasiswa Aktif</a>
        </div>
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
                            @if ($smahaktif->pdf_file)
                                <a href="{{ asset('storage/' . $smahaktif->pdf_file) }}" target="_blank">Lihat File</a>
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
