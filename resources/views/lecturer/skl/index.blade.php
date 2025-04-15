@extends('layouts.index')

@section('content')
    <div class="container">
        <h4 class="mb-4">Verifikasi Pengajuan Surat Keterangan Lulus</h4>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NRP</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tanggal Lulus</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sklList as $index => $skl)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $skl->nrp_nip }}</td>
                        <td>{{ $skl->nama_lengkap }}</td>
                        <td>{{ $skl->tanggal_lulus }}</td>
                        <td>
                            @if ($skl->status == 0)
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif ($skl->status == 1)
                                <span class="badge bg-success">Disetujui</span>
                            @elseif ($skl->status == 2)
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-primary">Selesai</span>
                            @endif
                        </td>
                        <td>
                            @if ($skl->status == 0)
                                <form action="{{ route('skl.approve', $skl->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm"
                                        onclick="return confirm('Yakin ingin menyetujui Surat Keterangan Lulus ini?')">Setujui</button>
                                </form>

                                <form action="{{ route('skl.reject', $skl->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menolak Surat Keterangan Lulus ini?')">Tolak</button>
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
