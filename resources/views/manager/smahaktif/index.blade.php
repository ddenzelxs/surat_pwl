@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Pengajuan Surat Mahasiswa Aktif yang Telah Disetujui</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pengajuan</li>
                <li class="breadcrumb-item active">Surat Mahasiswa Aktif Disetujui</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title pt-3">Daftar Pengajuan Surat Mahasiswa Aktif yang Telah Disetujui</h5>

            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Semester</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>File PDF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($smahaktifList as $index => $surat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $surat->nrp_nip }}</td>
                                    <td>{{ $surat->nama_lengkap }}</td>
                                    <td>{{ $surat->semester }}</td>
                                    <td>{{ $surat->keperluan_pengajuan }}</td>
                                    <td>
                                        @if ($surat->status == 1)
                                            <span class="badge bg-success">Disetujui</span>
                                        @elseif ($surat->status == 3)
                                            <span class="badge bg-primary">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($surat->pdf_file)
                                            <a href="{{ asset('storage/' . $surat->pdf_file) }}" target="_blank">Lihat File</a>
                                        @else
                                            <em>Belum dikirim</em>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$surat->pdf_file)
                                            <form action="{{ route('manager.smahaktif.sendPdf', $surat->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-1">
                                                @csrf
                                                @method('PUT')
                                                <input type="file" name="pdf_file" accept="application/pdf" required class="form-control form-control-sm mb-1">
                                                <button type="submit" class="btn btn-sm btn-primary">Kirim PDF</button>
                                            </form>
                                        @else
                                            <em>Sudah dikirim</em>
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

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable();
        });
    </script>
@endpush
