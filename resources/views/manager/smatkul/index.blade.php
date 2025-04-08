@extends('layouts.index')

@section('content')
    <h1 class="mb-4">Pengajuan Surat Keterangan Mata Kuliah yang telah disetujui</h1>
    <table class="table table-bordered">
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
            @foreach ($smatkuls as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nrp_nip }}</td>
                    <td>{{ $item->nama_mata_kuliah }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>
                        @if ($item->status === 1)
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->pdf_file)
                            <a href="{{ asset('storage/' . $item->pdf_file) }}" target="_blank">Lihat PDF</a>
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->status === 1 && !$item->pdf_file)
                            <form action="{{ route('manager.smatkul.sendPdf', $item->id) }}" method="POST">
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
