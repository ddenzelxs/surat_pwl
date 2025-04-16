@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Verifikasi Pengajuan Surat Mahasiswa Aktif</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pengajuan</li>
                <li class="breadcrumb-item active">Surat Mahasiswa Aktif</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title pt-3">Daftar Pengajuan Surat Mahasiswa Aktif</h5>

            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Semester</th>
                            <th>Alamat</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($smahaktifList as $index => $smahaktif)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $smahaktif->nrp_nip }}</td>
                                <td>{{ $smahaktif->nama_lengkap }}</td>
                                <td>{{ $smahaktif->semester }}</td>
                                <td>{{ $smahaktif->alamat }}</td>
                                <td>{{ $smahaktif->keperluan_pengajuan }}</td>
                                <td>
                                    @if ($smahaktif->status == 0)
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif ($smahaktif->status == 1)
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($smahaktif->status == 2)
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-primary">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($smahaktif->status == 0)
                                        <form action="{{ route('smahak$smahaktif.approve', $smahaktif->id) }}"
                                            method="POST" style="display:inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm"
                                                onclick="return confirm('Yakin ingin menyetujui Laporan Hasil Studi ini?')">Setujui</button>
                                        </form>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalTolak-{{ $smahaktif->id }}">
                                            Tolak
                                        </button>

                                        <!-- Modal untuk isi alasan penolakan -->
                                        <div class="modal fade" id="modalTolak-{{ $smahaktif->id }}" tabindex="-1"
                                            aria-labelledby="modalTolakLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('smaha$smahaktif.reject', $smahaktif->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalTolakLabel">Alasan Penolakan
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Tutup"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="keterangan_penolakan"
                                                                    class="form-label">Keterangan</label>
                                                                <textarea class="form-control" name="keterangan_penolakan" rows="4" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Tolak</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @elseif ($smahaktif->status == 2)
                                        <span class="text-danger d-block mt-1"><strong>Alasan:</strong>
                                            {{ $smahaktif->keterangan_penolakan }}</span>
                                    @elseif ($smahaktif->status == 3)
                                        <a href="{{ asset('storage/' . $smahaktif->pdf_file) }}" target="_blank">Lihat
                                            PDF</a>
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
        $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>
@endpush
