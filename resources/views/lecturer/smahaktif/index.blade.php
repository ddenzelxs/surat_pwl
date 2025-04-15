@extends('layouts.index')

@section('content')
    <div class="container">
        <h4 class="mb-4">Verifikasi Pengajuan Surat Mahasiswa Aktif</h4>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Semester</th>
                    <th>Alamat</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($smahaktifList as $index => $smahaktif)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $smahaktif->nrp_nip }}</td>
                        <td>{{ $smahaktif->nama_lengkap }}</td>
                        <td>{{ $smahaktif->semester }}</td>
                        <td>{{ $smahaktif->alamat }}</td>
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
                            @if ($surat->status == 0)
                                <form action="{{ route('smahaktif.approve', $surat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success btn-sm"
                                        onclick="return confirm('Setujui pengajuan ini?')">Setujui</button>
                                </form>
                                <form action="{{ route('smahaktif.reject', $surat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tolak pengajuan ini?')">Tolak</button>
                                </form>
                            @else
                                <em>Tidak ada aksi</em>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
