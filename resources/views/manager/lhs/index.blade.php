@extends('layouts.index')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Surat LHS</h1>
    <table class="table datatable">
        <thead>
            <tr>
                <th>NRP</th>
                <th>Nama Mahasiswa</th>
                <th>Semester</th>
                <th>Tahun Akademik</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lhsList as $lhs)
            <tr>
                <td>{{ $lhs->nrp }}</td>
                <td>{{ $lhs->nama_mahasiswa }}</td>
                <td>{{ $lhs->semester }}</td>
                <td>{{ $lhs->tahun_akademik }}</td>
                <td>
                    @if($lhs->status == 0)
                        <span class="badge bg-warning">Menunggu</span>
                    @elseif($lhs->status == 1)
                        <span class="badge bg-success">Disetujui</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Detail</a>
                    <a href="#" class="btn btn-success btn-sm">Kirim PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
