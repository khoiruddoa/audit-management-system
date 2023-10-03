<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
<!-- @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2) -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Menu Auditor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('kegiatan_audit')}}">
              <i class="bi bi-circle"></i><span>Kegiatan Audit</span>
            </a>
          </li>
          <li>
            <a href="{{route('perencanaan_audit')}}">
              <i class="bi bi-circle"></i><span>Perencanaan Audit</span>
            </a>
          </li>
          <li>
            <a href="{{route('pelaksanaan_audit')}}">
              <i class="bi bi-circle"></i><span>Pelaksanaan Audit</span>
            </a>
          </li>
          
          <li>
            <a href="{{route('tanggapan_auditee_auditor')}}">
              <i class="bi bi-circle"></i><span>Tanggapan Auditee</span>
            </a>
          </li>
          <li>
            <a href="{{route('tindaklanjut_audit_auditor')}}">
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
      <!-- @endif

      <!-- @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2) -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Menu Auditee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         
         
         
          <li>
            <a href="{{route('program_kerja_audit_document_auditee')}}">
              <i class="bi bi-circle"></i><span>Kelengkapan Dokumen</span>
            </a>
          </li>
          
          <li>
            <a href="{{route('temuan_audit')}}">
              <i class="bi bi-circle"></i><span>Temuan</span>
            </a>
          </li>
          <li>
            <a href="{{route('tindaklanjut_auditee')}}">
              <i class="bi bi-circle"></i><span>Tindak Lanjut Auditee</span>
            </a>
          </li>
          <li>
            <a href="{{route('laporan_audit')}}">
              <i class="bi bi-circle"></i><span>Pelaporan Audit</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->
      <!-- @endif

      @if(auth()->user()->role_id == 1) -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('manajemen_pegawai')}}">
          <i class="bi bi-person"></i>
          <span>Manajemen Pegawai</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('manajemen_auditor')}}">
          <i class="bi bi-person"></i>
          <span>Manajemen Auditor</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('manajemen_auditee')}}">
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
            <a href="{{route('pustaka_program_audit')}}">
              <i class="bi bi-circle"></i><span>Pustaka Program Audit</span>
            </a>
          </li>
          <li>
            <a href="{{route('pustaka_referensi_audit')}}">
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
      <!-- @endif

      
      @if(auth()->user()->role_id == 3) -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('temuan_audit')}}">
          <i class="bi bi-person"></i>
          <span>Temuan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('tanggapan_audit')}}">
          <i class="bi bi-person"></i>
          <span>Tanggapan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('tindaklanjut_audit')}}">
          <i class="bi bi-person"></i>
          <span>Tindak lanjut</span>
        </a>
      </li>
      <!-- @endif -->

      
      
      
      <!-- End Profile Page Nav -->

     

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav --> --}}

    </ul>

  </aside><!-- End Sidebar-->