@extends('layouts.index')

@section('content')
<div class="container mx-auto px-4 py-6">


    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Laporan Hasil Studi --}}
        <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition text-center">
            <div class="fs-3">📚</div>
            <h2 class="text-base font-semibold text-gray-800 mb-2">Laporan Hasil Studi</h2>
            <a href="{{ route('manager.lhs.index') }}" class="text-sm text-blue-600 hover:underline">Lihat Detail</a>
        </div>

        {{-- Surat Keterangan Mahasiswa Aktif --}}
        <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition text-center">
            <div class="fs-3">📄</div>
            <h2 class="text-base font-semibold text-gray-800 mb-2">Surat Keterangan Mahasiswa Aktif</h2>
            <a href="{{ route('manager.smahaktif.index') }}" class="text-sm text-blue-600 hover:underline">Lihat Detail</a>
        </div>

        {{-- Surat Pengantar Tugas Mata Kuliah --}}
        <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition text-center">
            <div class="fs-3">📝</div>
            <h2 class="text-base font-semibold text-gray-800 mb-2">Surat Pengantar Tugas Mata Kuliah</h2>
            <a href="{{ route('manager.smatkul.index') }}" class="text-sm text-blue-600 hover:underline">Lihat Detail</a>
        </div>

        {{-- Surat Keterangan Lulus --}}
        <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition text-center">
            <div class="fs-3">🎓</div>
            <h2 class="text-base font-semibold text-gray-800 mb-2">Surat Keterangan Lulus</h2>
            <a href="{{ route('manager.skl.index') }}" class="text-sm text-blue-600 hover:underline">Lihat Detail</a>
        </div>
    </div>
</div>
@endsection
``
