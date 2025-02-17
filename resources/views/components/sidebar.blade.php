<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('home')}}">Palembang Stay</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('home') }}">General Dashboard</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('users.index') }}">All Users</a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="nav-link"  href="{{ route('fasilitas.index') }}">Fasilitas</a>
            </li>

            <li>
                <a class="nav-link"  href="{{ route('mapels.index') }}">Mapel</a>
            </li>

            <li>
                <a class="nav-link"  href="{{ route('jadwals.index') }}">Jadwal</a>
            </li>
            <li>
                <a class="nav-link"  href="{{ route('kelas.index') }}">Kelas</a>
            </li>
            <li>
                <a class="nav-link"  href="{{ route('siswas.index') }}">Siswa</a>
            </li>
            <li>
                <a class="nav-link"  href="{{ route('nilai.index') }}">Nilai</a>
            </li>

    </aside>
</div>
