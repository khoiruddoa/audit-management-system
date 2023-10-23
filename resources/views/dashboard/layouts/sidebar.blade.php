<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @if (Auth::user()->hasRole('auditor') ||
                Auth::user()->hasRole('lead auditor') ||
                Auth::user()->hasRole('admin') ||
                Auth::user()->hasRole('super admin'))
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Menu Auditor</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('kegiatan_audit') }}">
                            <i class="bi bi-circle"></i><span>Kegiatan Audit</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('perencanaan_audit') }}">
                            <i class="bi bi-circle"></i><span>Perencanaan Audit</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pelaksanaan_audit') }}">
                            <i class="bi bi-circle"></i><span>Pelaksanaan Audit</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('tanggapan_auditee_auditor') }}">
                            <i class="bi bi-circle"></i><span>Tanggapan Auditee</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tindaklanjut_audit_auditor') }}">
                            <i class="bi bi-circle"></i><span>Tindak Lanjut Audit</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Pelaporan Audit</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->
        @endif
        @if (Auth::user()->hasRole('auditee') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('super admin'))
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Menu Auditee</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">



                    <li>
                        <a href="{{ route('program_kerja_audit_document_auditee') }}">
                            <i class="bi bi-circle"></i><span>Kelengkapan Dokumen</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('temuan_audit') }}">
                            <i class="bi bi-circle"></i><span>Temuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tindaklanjut_auditee') }}">
                            <i class="bi bi-circle"></i><span>Tindak Lanjut Auditee</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('laporan_audit') }}">
                            <i class="bi bi-circle"></i><span>Pelaporan Audit</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->
        @endif
        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super admin'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('manajemen_pegawai') }}">
                    <i class="bi bi-person"></i>
                    <span>Manajemen Pegawai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('manajemen_role') }}">
                    <i class="bi bi-person"></i>
                    <span>Manajemen Role</span>
                </a>
            </li>

            <!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('manajemen_auditor') }}">
                    <i class="bi bi-person"></i>
                    <span>Manajemen Auditor</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('manajemen_auditee') }}">
                    <i class="bi bi-person"></i>
                    <span>Manajemen Auditee</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Pustaka Audit</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('pustaka_program_audit') }}">
                            <i class="bi bi-circle"></i><span>Pustaka Program Audit</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pustaka_referensi_audit') }}">
                            <i class="bi bi-circle"></i><span>Pustaka Referensi Audit</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Parameter Aplikasi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>#</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Icons Nav -->
        @endif
    </ul>

</aside><!-- End Sidebar-->
