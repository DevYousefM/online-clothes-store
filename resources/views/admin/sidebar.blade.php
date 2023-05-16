<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('admin/assets/images/logo.svg') }}"
                alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset('admin/assets/images/logo-mini.svg') }}" alt="logo" /></a>
    </div>
    <ul class="nav">

        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('add_product') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Products</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Catagories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    @isset($catagories)
                        @foreach ($catagories as $item)
                            <li class="nav-item"><a class="nav-link" style="text-transform: capitalize;"
                                    href={{ route('catagory', ['name' => $item->name]) }}>{{ $item->name }}</a></li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order">
                <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                </span>
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="order">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" style="text-transform: capitalize;"
                            href={{ route('new_orders') }}>New Orders</a></li>
                    <li class="nav-item"><a class="nav-link" style="text-transform: capitalize;"
                            href={{ route('users_orders') }}>Users Orders</a></li>
                    <li class="nav-item"><a class="nav-link" style="text-transform: capitalize;"
                            href={{ route('companies_orders') }}>Companies Orders</a></li>
                    <li class="nav-item"><a class="nav-link" style="text-transform: capitalize;"
                            href={{ route('reviewed_orders') }}>Reviewed Orders</a></li>
                    <li class="nav-item"><a class="nav-link" style="text-transform: capitalize;"
                            href={{ route('completed_orders') }}>Completed Orders</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
<!-- partial -->
