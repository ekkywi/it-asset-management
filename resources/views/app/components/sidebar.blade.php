<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route("dashboard") }}">IT Asset Management</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route("dashboard") }}">ITAM</a>
        </div>
        <ul class="sidebar-menu">

            {{-- Menu Header Dashboard --}}
            <li class="menu-header">Dashboard</li>

            {{-- Menu Dashboard --}}
            <li class="dropdown {{ Request::is("dashboard") ? "active" : "" }}">
                <a class="nav-link" href="{{ route("dashboard") }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            {{-- Menu Header Master Data --}}
            <li class="menu-header">Master Data</li>

            {{-- Menu Merk --}}
            <li class="dropdown {{ Request::is("merk") || Request::is("merk/*") ? "active" : "" }}">
                <a class="nav-link" href="{{ route("merk") }}"><i class="fas fa-tags"></i> <span>Merk</span></a>
            </li>

            {{-- Menu Model --}}
            <li class="dropdown {{ Request::is("model") || Request::is("model/*") ? "active" : "" }}">
                <a class="nav-link" href="{{ route("model") }}"><i class="fas fa-cubes"></i> <span>Model</span></a>
            </li>

        </ul>

        {{-- Menu Pengaturan --}}
        <div class="menu-divider">
            <hr>
            <ul class="sidebar-menu">
                <li class="menu-header">Pengaturan</li>
                <li class="dropdown {{ Request::is("pengguna") || Request::is("pengguna/*") || Request::is("bagian") || Request::is("bagian/*") || Request::is("jabatan") || Request::is("jabatan/*") || Request::is("peran") || Request::is("peran/*") ? "active" : "" }}">
                    <a class="nav-link has-dropdown" href="#"><i class="fas fa-rocket"></i> <span>Aplikasi</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is("pengguna") || Request::is("pengguna/*") ? "active" : "" }}"><a class="nav-link" href="{{ route("user") }}">Pengguna</a></li>
                        <li class="{{ Request::is("bagian") || Request::is("bagian/*") ? "active" : "" }}"><a class="nav-link" href="{{ route("section") }}">Bagian</a></li>
                        <li class="{{ Request::is("jabatan") || Request::is("jabatan/*") ? "active" : "" }}"><a class="nav-link" href="{{ route("position") }}">Jabatan</a></li>
                        <li class="{{ Request::is("peran") || Request::is("peran/*") ? "active" : "" }}"><a class="nav-link" href="{{ route("role") }}">Peran</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- Menu Logout --}}
        <div class="menu-divider">
            <hr>
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <form action="{{ route("logout") }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-lg btn-block btn-icon-split" type="submit">
                        <i class="fas fa-power-off"></i> Logout
                    </button>
                </form>
            </div>
        </div>

    </aside>
</div>
