@extends('layouts.index')


@section('content')
    {{-- Tabel daftar skl --}}
    <div class="mb-3">
        <a href="{{ route('student.skl.create') }}" class="btn btn-primary">Ajukan Surat Keterangan Lulus</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>File PDF</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sklList as $index => $skl)
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
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pengajuan skl</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
@endsection
