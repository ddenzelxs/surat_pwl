<aside id="sidebar" class="sidebar collapsed" style="z-index: 1030;">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('lecturer.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        {{-- Tables Nav --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#table-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="table-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('lecturer.lhs.index') }}">
                        <i class="bi bi-circle"></i><span>Laporan Hasil Studi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('lecturer.smahaktif.index') }}">
                        <i class="bi bi-circle"></i><span>Surat Keterangan Mahasiswa Aktif</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('lecturer.smatkul.index') }}">
                        <i class="bi bi-circle"></i><span>Surat Pengantar Tugas Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('lecturer.skl.index') }}">
                        <i class="bi bi-circle"></i><span>Surat Keterangan Lulus</span>
                    </a>
                </li>
            </ul>
        </li><!-- Tables Nav -->
    </ul>
</aside><!-- End Sidebar-->
