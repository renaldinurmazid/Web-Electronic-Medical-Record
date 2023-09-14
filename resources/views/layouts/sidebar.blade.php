@auth
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/home">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('emr.png') }}" alt="" width="70px" height="70px">
        </div>
        <div class="sidebar-brand-text mx-3">UKS<br>SMKN 1 SUBANG</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @if(auth()->user()->role === 'admin')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kelas') }}">
            <i class="fas fa-fw fa-university"></i>
            <span>Data Kelas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('siswa') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Siswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('obats') }}">
            <i class="fas fa-fw fa-tablets"></i>
            <span>Data Obat</span></a>
    </li>

    @elseif(auth()->user()->role === 'petugas')
    <li class="nav-item">
        <a class="nav-link" href="/petugas/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kelas') }}">
            <i class="fas fa-fw fa-university"></i>
            <span>Data Kelas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('siswa') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Siswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('obats') }}">
            <i class="fas fa-fw fa-tablets"></i>
            <span>Data Obat</span></a>
    </li>
    @endif
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
@endauth