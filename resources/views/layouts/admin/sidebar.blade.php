<aside id="sidebar" class="sidebar collapsed" style="z-index: 1030;">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.index') }}">
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
                    <a href="{{ route('admin.student') }}">
                        <i class="bi bi-circle"></i><span>Student</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.lecturer') }}">
                        <i class="bi bi-circle"></i><span>Lecturer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manager') }}">
                        <i class="bi bi-circle"></i><span>Manager</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('prodi.index') }}">
                        <i class="bi bi-circle"></i><span>Program Studi</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- User Nav -->
        </li>
    </ul>
</aside><!-- End Sidebar-->
