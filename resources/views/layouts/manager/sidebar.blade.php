<aside id="sidebar" class="sidebar collapsed">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manager.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        {{-- User Nav --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-table"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('manager.student') }}">
                        <i class="bi bi-circle"></i><span>Student</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manager.lecturer') }}">
                        <i class="bi bi-circle"></i><span>Lecturer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manager.manager') }}">
                        <i class="bi bi-circle"></i><span>Manager</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- User Nav -->

        {{-- Tables Nav --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#table-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="table-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('manager.lhs.index') }}">
                        <i class="bi bi-circle"></i><span>Laporan Hasil Studi</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Surat Keterangan Mahasiswa Aktif</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Surat Pengantar Tugas Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manager.skl.index') }}">
                        <i class="bi bi-circle"></i><span>Surat Keterangan Lulus</span>
                    </a>
                </li>
            </ul>
        </li><!-- Tables Nav -->
    </ul>
</aside><!-- End Sidebar-->
