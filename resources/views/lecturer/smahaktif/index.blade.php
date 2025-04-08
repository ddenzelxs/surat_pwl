@extends('layouts.index')

@section('content')
<h4 class="mb-4">Verifikasi Pengajuan Surat Mahasiswa Aktif</h4>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-info">
            <tr>
                <th>#</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Semester</th>
                <th>Keperluan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($smahaktifList as $index => $surat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $surat->nrp_nip }}</td>
                    <td>{{ $surat->nama_lengkap }}</td>
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
                        @if ($surat->status == 0)
                            <form action="{{ route('smahaktif.approve', $surat->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success btn-sm" onclick="return confirm('Setujui pengajuan ini?')">Setujui</button>
                            </form>
                            <form action="{{ route('smahaktif.reject', $surat->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tolak pengajuan ini?')">Tolak</button>
                            </form>
                        @else
                            <em>Tidak ada aksi</em>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Tidak ada pengajuan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
