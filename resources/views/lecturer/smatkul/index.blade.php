@extends('layouts.index')

@section('content')
    <h1 class="mb-4">Verifikasi Surat Keterangan Mata Kuliah</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NRP</th>
                <th>Nama MK</th>
                <th>Semester</th>
                <th>Status</th>
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
                        @if ($item->status === 0)
                            <span class="badge bg-warning">Menunggu</span>
                        @elseif ($item->status === 1)
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->status === 0)
                            <form action="{{ route('smatkul.approve', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            <form action="{{ route('smatkul.reject', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
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
