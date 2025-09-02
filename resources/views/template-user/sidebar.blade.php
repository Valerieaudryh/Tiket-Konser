<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-text mx-3">M V G</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('/user')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('/#price')}}">
            <i class="fas fa-fw fa-archive"></i>
            <span>List Produk</span></a>
    </li>
    @if(Session::get('userdata')->level == 0)
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Rincian
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('transaksi/sudah-bayar') || request()->is('transaksi/belum-bayar') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kategori Transaksi:</h6>
                    <a class="collapse-item" href="{{url('/transaksi/sudah-bayar')}}">Sudah Dibayar</a>
                    <a class="collapse-item" href="{{url('/transaksi/belum-bayar')}}">Belum Dibayar</a>
                </div>
            </div>
        </li>
    @endif

    @if(Session::get('userdata')->level == 1)
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manajemen
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ request()->is('produk') || Str::startsWith(request()->path(), 'atur/variasi') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Produk</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Atur Produk:</h6>
                    <a class="collapse-item" href="{{url('/produk')}}">Manajemen Produk</a>
                    {{-- <a class="collapse-item" href="{{url('/variasi')}}">Manajemen Variasi</a> --}}
                    {{-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a> --}}
                </div>
            </div>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->