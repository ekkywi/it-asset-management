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

            <li class="menu-header">Data Aset</li>

            {{-- Menu Data Aset --}}
            <li class="dropdown {{ Request::is("itam/aset/*") ? "active" : "" }}">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-cube"></i> <span>Data Aset</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/aset/semua-aset") ? "active" : "" }}"><a class="nav-link" href="#">Semua Aset</a></li>
                    <li class="{{ Request::is("itam/aset/sedang-digunakan") ? "active" : "" }}"><a class="nav-link" href="#">Sedang Digunakan</a></li>
                    <li class="{{ Request::is("itam/aset/tanpa-pic") ? "active" : "" }}"><a class="nav-link" href="#">Tanpa PIC</a></li>
                    <li class="{{ Request::is("itam/aset/dipinjam") ? "active" : "" }}"><a class="nav-link" href="#">Dipinjam</a></li>
                    <li class="{{ Request::is("itam/aset/perbaikan") ? "active" : "" }}"><a class="nav-link" href="#">Perbaikan</a></li>
                    <li class="{{ Request::is("itam/aset/rusak") ? "active" : "" }}"><a class="nav-link" href="#">Rusak</a></li>
                    <li class="{{ Request::is("itam/aset/dimusnahkan") ? "active" : "" }}"><a class="nav-link" href="#">Dimusnahkan</a></li>
                </ul>
            </li>

            {{-- Menu Hardware --}}
            <li class="dropdown {{ Request::is("hardware") ? "active" : "" }}">
                <a class="nav-link" href="#"><i class="fas fa-computer"></i> <span>Hardware</span></a>
            </li>

            {{-- Menu Komponen --}}
            <li class="dropdown {{ Request::is("komponen") ? "active" : "" }} ">
                <a class="nav-link" href="#"><i class="fas fa-memory"></i> <span>Komponen</span></a>
            </li>

            {{-- Menu Akseoris --}}
            <li {{ Request::is("aksesoris") ? "active" : "" }} class="dropdown">
                <a class="nav-link" href="#"><i class="fas fa-keyboard"></i> <span>Aksesoris</span></a>
            </li>

            {{-- Menu Lisensi --}}
            <li class="dropdown {{ Request::is("lisensi") ? "active" : "" }}">
                <a class="nav-link" href="#"><i class="fas fa-key"></i> <span>Lisensi</span></a>
            </li>

            {{-- Menu Stok Aset --}}
            <li class="{{ Request::is("stok-aset") ? "active" : "" }}">
                <a class="nav-link" href="#"><i class="fas fa-cubes"></i> <span>Stok Aset</span></a>
            </li>

            <li class="menu-header">Penomoran Aset</li>

            {{-- Menu Penomoran --}}
            <li class="dropdown {{ Request::is("itam/penomoran/*") ? "active" : "" }}">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-list-ol"></i> <span>Penomoran</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/penomoran/nomor-inv") ? "active" : "" }}"><a class="nav-link" href="#">Nomor INV</a></li>
                    <li class="{{ Request::is("itam/penomoran/nomor-sip") ? "active" : "" }}"><a class="nav-link" href="#">Nomor SIP</a></li>
                    <li class="{{ Request::is("itam/penomoran/nomor-aset") ? "active" : "" }}"><a class="nav-link" href="#">Nomor Aset</a></li>
                </ul>
            </li>

            <li class="menu-header">Pengaturan</li>

            {{-- Menu Informasi Aset --}}
            <li class="dropdown {{ Request::is("informasi-aset/*") ? "active" : "" }}">
                <a class ="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-info"></i> <span>Informasi Aset</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("informasi-aset/kategori-aset") ? "active" : "" }}"><a class="nav-link" href="{{ url("informasi-aset/kategori-aset") }}">Kategori Aset</a></li>
                    <li class="{{ Request::is("informasi-aset/merek-aset") ? "active" : "" }}"><a class="nav-link" href="{{ url("informasi-aset/merek-aset") }}">Merek Aset</a></li>
                    <li class="{{ Request::is("informasi-aset/model-aset") ? "active" : "" }}"><a class="nav-link" href="{{ url("informasi-aset/model-aset") }}">Model Aset</a></li>
                    <li class="{{ Request::is("informasi-aset/supplier-aset") ? "active" : "" }}"><a class="nav-link" href="{{ url("informasi-aset/supplier-aset") }}">Supplier Aset</a></li>
                </ul>
            </li>

            {{-- Menu Pengguna --}}
            <li class="dropdown {{ Request::is("pengguna") ? "active" : "" }}">
                <a class ="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-users"></i> <span>Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("pengguna/daftar-pengguna") ? "active" : "" }}"><a class="nav-link" href="#">Daftar Pengguna</a></li>
                    <li class="{{ Request::is("pengguna/bagian") ? "active" : "" }}"><a class="nav-link" href="#">Bagian</a></li>
                    <li class="{{ Request::is("pengguna/jabatan") ? "active" : "" }}"><a class="nav-link" href="#">Jabatan</a></li>
                </ul>
            </li>

            <li class="menu-header">Laporan</li>

            {{-- Menu Laporan --}}
            <li class="dropdown {{ Request::is("itam/laporan/*") ? "active" : "" }}">
                <a class='nav-link has-dropdown' data-toggle="dropdown" href="#"><i class="fas fa-file"></i> <span>Log</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/laporan/log-aset") ? "active" : "" }}"><a class="nav-link" href="#">Log Aset</a></li>

                </ul>
            </li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a class="btn btn-danger btn-lg btn-block btn-icon-split" href="{{ url("dashboard") }}">
                    <i class="fas fa-power-off"></i> Logout
                </a>
            </div>
    </aside>
</div>
