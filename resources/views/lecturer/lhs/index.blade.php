@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Verifikasi Pengajuan Laporan Hasil Studi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pengajuan</li>
                <li class="breadcrumb-item active">Verifikasi Laporan Hasil Studi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title pt-3">Daftar Pengajuan Laporan Hasil Studi</h5>

            <div class="table-responsive">
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
                                        <form action="{{ route('lhs.approve', $lhs->id) }}" method="POST" style="display:inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menyetujui Laporan Hasil Studi ini?')">Setujui</button>
                                        </form>

                                        <form action="{{ route('lhs.reject', $lhs->id) }}" method="POST" style="display:inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menolak Laporan Hasil Studi ini?')">Tolak</button>
                                        </form>
                                    @else
                                        <em>Tindakan selesai</em>
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
