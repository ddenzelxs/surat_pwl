@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Surat Keterangan Lulus</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pengajuan</li>
                <li class="breadcrumb-item active">Surat Keterangan Lulus</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title pt-3">Daftar Pengajuan Surat Keterangan Lulus</h5>

            <div class="table-responsive">
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
                                    @if ($skl->status == 1)
                                        <form action="{{ route('manager.skl.sendPdf', $skl->id) }}" method="POST"
                                            enctype="multipart/form-data" class="d-flex flex-column gap-1">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" name="pdf_file" accept="application/pdf" required
                                                class="form-control form-control-sm">
                                            <button type="submit" class="btn btn-success btn-sm mt-1">Kirim PDF</button>
                                        </form>
                                    @elseif ($skl->status == 3)
                                        <a href="{{ asset('storage/' . $skl->pdf_file) }}" target="_blank">Lihat PDF</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- End table-responsive -->
        </div>
    </div><!-- End card -->
@endsection
