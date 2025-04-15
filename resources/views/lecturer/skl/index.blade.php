@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Verifikasi Pengajuan Surat Keterangan Lulus</h1>
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
                                    @if ($skl->status == 0)
                                        <form action="{{ route('skl.approve', $skl->id) }}" method="POST"
                                            style="display:inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm"
                                                onclick="return confirm('Yakin ingin menyetujui Laporan Hasil Studi ini?')">Setujui</button>
                                        </form>

                                        <form action="{{ route('skl.reject', $skl->id) }}" method="POST"
                                            style="display:inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menolak Laporan Hasil Studi ini?')">Tolak</button>
                                        </form>
                                    @elseif ($skl->status == 3)
                                        <a href="{{ asset('storage/' . $lhs->pdf_file) }}" target="_blank">Lihat PDF</a>
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
