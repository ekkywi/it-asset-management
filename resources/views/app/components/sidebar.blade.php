<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url("/dashboard") }}">IT Asset Management</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url("/dashboard") }}">ITAM</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>

            {{-- Menu Dashboard --}}
            <li class="dropdown {{ Request::is("dashboard") ? "active" : "" }}">
                <a class="nav-link" href="{{ url("dashboard") }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Pengaturan</li>

            {{-- Menu Pengguna --}}
            <li class="dropdown {{ Request::is("pengguna/*") ? "active" : "" }}">
                <a class ="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-users"></i> <span>Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("pengguna/bagian") ? "active" : "" }}"><a class="nav-link" href="{{ url("pengguna/bagian") }}">Bagian</a></li>
                </ul>
            </li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a class="btn btn-danger btn-lg btn-block btn-icon-split" href="{{ url("dashboard") }}">
                    <i class="fas fa-power-off"></i> Logout
                </a>
            </div>
    </aside>
</div>
