@extends('layouts.index')

@section('content')
<h4 class="mb-4">Verifikasi Pengajuan Surat Keterangan Lulus</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>NRP/NIP</th>
                    <th>Nama Mahasiswa</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sklList as $index => $skl)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $skl->nrp_nip }}</td>
                        <td>{{ $skl->nama_lengkap }}</td>
                        <td>{{ $skl->keperluan_pembuatan_laporan }}</td>
                        <td>
                            @if ($skl->status == 0)
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif ($skl->status == 1)
                                <span class="badge bg-success">Disetujui</span>
                            @elseif ($skl->status ==2)
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-primary">Selesai</span>
                            @endif
                        </td>
                        <td>
                            @if ($skl->status == 0)
                            <form action="{{ route('skl.approve', $skl->id  ) }}" method="POST"

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
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pengajuan surat keterangan lulus dari mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
@endsection
