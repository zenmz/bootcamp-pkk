<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Request::is('dashboard')) active @endif">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth::user()->role == 'admin')
    <li class="nav-item {{ Request::is('sekolah*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('sekolah') }}">
            {{-- <i class="fas fa-fw fa-cog"></i> --}}
            <i class="fa fa-university" aria-hidden="true"></i>
            <span>Sekolah</span>
        </a>
    </li>

    <li class="nav-item @if(Request::is('siswa*')) active @endif">
        <a class="nav-link" href="{{ url('siswa') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Siswa</span>
        </a>
    </li>
    @elseif(Auth::user()->role == 'user')
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Riwayat Pembelian</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Profil</span>
        </a>
    </li>
    @endif






    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
