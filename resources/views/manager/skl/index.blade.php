@extends('layouts.index')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Pengajuan Surat Keterangan Lulus</h1>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>NRP</th>
                    <th>Nama Mahasiswa</th>
                    <th>Keperluan Pembuatan Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sklList as $skl)
                    <tr>
                        <td>{{ $skl->nrp_nip }}</td>
                        <td>{{ $skl->nama_lengkap }}</td>
                        <td>{{ $skl->keperluan_pembuatan_laporan }}</td>
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
                            <form action="{{ route('manager.skl.sendPdf', $skl->id) }}" method="POST"
                                enctype="multipart/form-data" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="file" name="pdf_file" accept="application/pdf" required
                                    class="form-control form-control-sm mb-1">
                                <button type="submit" class="btn btn-success btn-sm">Kirim PDF</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
