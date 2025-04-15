@extends('layouts.index')

@section('content')
    <div class="container">
        <h4 class="mb-4">Verifikasi Pengajuan Laporan Hasil Studi</h4>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NRP</th>
                    <th>Nama Mahasiswa</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lhsList as $index => $lhs)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $lhs->nrp_nip }}</td>
                        <td>{{ $lhs->nama_lengkap }}</td>
                        <td>{{ $lhs->keperluan_pembuatan_laporan }}</td>
                        <td>
                            @if ($lhs->status == 0)
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif ($lhs->status == 1)
                                <span class="badge bg-success">Disetujui</span>
                            @elseif ($lhs->status == 2)
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-primary">Selesai</span>
                            @endif
                        </td>
                        <td>
                            @if ($lhs->status == 0)
                                <form action="{{ route('lhs.approve', $lhs->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm"
                                        onclick="return confirm('Yakin ingin menyetujui Laporan Hasil Studi ini?')">Setujui</button>
                                </form>

                                <form action="{{ route('lhs.reject', $lhs->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menolak Laporan Hasil Studi ini?')">Tolak</button>
                                </form>
                            @else
                                <em>Tindakan selesai</em>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
