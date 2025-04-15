@extends('layouts.index')

@section('content')
    <div class="container">
        <h4 class="mb-4">Pengajuan Laporan Hasil Studi</h4>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NRP</th>
                    <th>Nama Mahasiswa</th>
                    <th>Keperluan Pembuatan Laporan</th>
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
                            <form action="{{ route('manager.lhs.sendPdf', $lhs->id) }}" method="POST"
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
