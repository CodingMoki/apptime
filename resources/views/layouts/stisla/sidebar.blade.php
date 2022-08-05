<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><p>Safety Accountibility Program</p></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SAP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
           
            <li class="nav-item dropdown {{ Request::segment(2) === 'inspeksi' ? 'active' : '' }}">
                <a href="{{ route('inspeksi.index') }}" class="nav-link"><i class="fas fa-user-edit"></i> <span>Data Absensi</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'lokasi' ? 'active' : '' }}">
                <a href="{{ route('lokasi.index') }}" class="nav-link"><i class="fas fa-location-arrow"></i> <span>Lokasi</span></a>
            
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a class="btn btn-danger btn-lg btn-block btn-icon-split" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>
</div>