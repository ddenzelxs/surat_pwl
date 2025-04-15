@extends('layouts.index')

@section('content')
    <div class="container">
        <h4 class="mb-4">Verifikasi Surat Keterangan Mata Kuliah</h4>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NRP</th>
                    <th>Nama MK</th>
                    <th>Semester</th>
                    <th>Status</th>
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
                            @if ($smatkul->status === 0)
                                <span class="badge bg-warning">Menunggu</span>
                            @elseif ($smatkul->status === 1)
                                <span class="badge bg-success">Disetujui</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            @if ($smatkul->status === 0)
                                <form action="{{ route('smatkul.approve', $smatkul->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                </form>
                                <form action="{{ route('smatkul.reject', $smatkul->id) }}" method="POST" class="d-inline">
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
    </div>
@endsection
