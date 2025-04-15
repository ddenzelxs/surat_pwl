@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Pengajuan Surat Keterangan Mata Kuliah yang Telah Disetujui</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pengajuan</li>
                <li class="breadcrumb-item active">Surat Keterangan Mata Kuliah Disetujui</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title pt-3">Daftar Pengajuan Surat Keterangan Mata Kuliah yang Telah Disetujui</h5>

            <div class="table-responsive">
                <table class="table datatable ">
                    <thead class="table-success">
                        <tr>
                            <th>#</th>
                            <th>NRP</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>PDF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($smatkulList as $index => $smatkul)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $smatkul->nrp_nip }}</td>
                                <td>{{ $smatkul->nama_mata_kuliah }}</td>
                                <td>{{ $smatkul->semester }}</td>
                                <td>
                                    @if ($smatkul->status == 0)
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif ($smatkul->status == 1)
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($smatkul->status == 2)
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-primary">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($smatkul->pdf_file)
                                        <a href="{{ asset('storage/' . $smatkul->pdf_file) }}" target="_blank">Lihat PDF</a>
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($smatkul->status == 1)
                                        <form action="{{ route('manager.smatkul.sendPdf', $smatkul->id) }}" method="POST"
                                            enctype="multipart/form-data" class="d-flex flex-column gap-1">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" name="pdf_file" accept="application/pdf" required
                                                class="form-control form-control-sm">
                                            <button type="submit" class="btn btn-success btn-sm mt-1">Kirim PDF</button>
                                        </form>
                                    @elseif ($smatkul->status == 3)
                                        <a href="{{ asset('storage/' . $smatkul->pdf_file) }}" target="_blank">Lihat PDF</a>
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
