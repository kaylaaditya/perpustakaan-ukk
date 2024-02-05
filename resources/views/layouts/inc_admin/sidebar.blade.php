<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="http://localhost:8000/admin" class="brand-link">
        <img src="http://localhost:8000/logoperpus.png" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PERPUSWEB</span>
    </a>
    <div class="sidebar">

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="http://localhost:8000/admin"class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost:8000/tabel1" class="nav-link {{ Request::is('tabel1*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Data Buku</p>
                    </a>
                </li>
        <li class="nav-item">
            <a href="http://localhost:8000/laporan_perpustakaan" class="nav-link {{ Request::is('laporan*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-flag"></i>
                <p>Generate Laporan</p>
            </a>
                </li>
        <li class="nav-item">
            <a href="http://localhost:8000/peminjam" class="nav-link {{ Request::is('peminjam*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>Peminjaman</p>
            </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>    