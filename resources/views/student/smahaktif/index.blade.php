@extends('layouts.index')

@section('content')
<div class="mb-3">
    <a href="{{ route('student.smahaktif.create') }}" class="btn btn-primary">Ajukan Surat Keterangan Mahasiswa Aktif</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Semester</th>
                <th>Keperluan</th>
                <th>Status</th>
                <th>File PDF</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($smahaktifList as $index => $surat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $surat->semester }}</td>
                    <td>{{ $surat->keperluan_pengajuan }}</td>
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
                <tr><td colspan="5" class="text-center">Belum ada pengajuan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
