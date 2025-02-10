<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route("dashboard") }}">IT Asset Management</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route("dashboard") }}">ITAM</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>

            {{-- Menu Dashboard --}}
            <li class="dropdown {{ Request::is("dashboard") ? "active" : "" }}">
                <a class="nav-link" href="{{ route("dashboard") }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Pengaturan</li>

            {{-- Menu Pengguna --}}
            <li class="dropdown {{ Request::is("pengguna") || Request::is("pengguna/*") ? "active" : "" }}">
                <a class ="nav-link" href="{{ route("pengguna") }}"><i class="fas fa-users"></i> <span>Pengguna</span></a>
            </li>

            {{-- Menu Organisasi --}}
            <li class="dropdown {{ Request::is("organisasi/*") ? "active" : "" }}">
                <a class="nav-link has-dropdown" href="{{ url("organisasi") }}"><i class="fas fa-building"></i> <span>Organisasi</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("organisasi/bagian") || Request::is("organisasi/bagian/*") ? "active" : "" }}"><a class="nav-link" href="{{ route("organisasi.bagian") }}">Bagian</a></li>
                    <li class="{{ Request::is("organisasi/jabatan") || Request::is("organisasi/jabatan/*") ? "active" : "" }}"><a class="nav-link" href="{{ route("organisasi.jabatan") }}">Jabatan</a></li>
                    <li class="{{ Request::is("organisasi/peran") || Request::is("organisasi/peran/*") ? "active" : "" }}"><a class="nav-link" href="{{ route("organisasi.peran") }}">Peran</a></li>
                </ul>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form action="{{ route("logout") }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-lg btn-block btn-icon-split" type="submit">
                    <i class="fas fa-power-off"></i> Logout
                </button>
            </form>
        </div>
    </aside>
</div>
