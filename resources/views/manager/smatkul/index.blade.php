@extends('layouts.index')

@section('content')
    <h1 class="mb-4">Pengajuan Surat Keterangan Mata Kuliah yang telah disetujui</h1>
    <table class="table datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>NRP</th>
                <th>Nama MK</th>
                <th>Semester</th>
                <th>Status</th>
                <th>PDF</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($smatkulList as $smatkul)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $smatkul->nrp_nip }}</td>
                    <td>{{ $smatkul->nama_mata_kuliah }}</td>
                    <td>{{ $smatkul->semester }}</td>
                    <td>
                        @if ($smatkul->status === 1)
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-secondary">-</span>
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
                        @if ($smatkul->status === 1 && !$smatkul->pdf_file)
                            <form action="{{ route('manager.smatkul.sendPdf', $smatkul->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary btn-sm">Kirim PDF</button>
                            </form>
                        @else
                            <span>-</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
