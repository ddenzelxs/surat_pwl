@extends('layouts.index')

@section('content')
    <h1 class="mb-4">Pengajuan Surat Mahasiswa Aktif yang Telah Disetujui</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Semester</th>
                        <th>Keperluan</th>
                        <th>Status</th>
                        <th>File PDF</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($smahaktifList as $index => $surat)
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
                                    <form action="{{ route('smahaktif.sendPdf', $surat->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" name="pdf_file" accept="application/pdf" required
                                            class="form-control form-control-sm mb-1">
                                        <button type="submit" class="btn btn-sm btn-primary">Kirim PDF</button>
                                    </form>
                                @else
                                    <em>Sudah dikirim</em>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada pengajuan yang disetujui.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endsection
