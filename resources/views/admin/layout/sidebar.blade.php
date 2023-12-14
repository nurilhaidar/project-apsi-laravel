<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="d-flex justify-content-center">
            <img src="{{ asset('img/logo.png') }}" alt="User Image" height="100px">
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-house"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/order') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-basket-shopping"></i>
                        <p>
                            Order
                        </p>
                    </a>
                </li>
                <li class="nav-header">TABEL DATABASE</li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/jam') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-table"></i>
                        <p>
                            Tabel Jam
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/studio') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-table"></i>
                        <p>
                            Tabel Studio
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/tema') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-table"></i>
                        <p>
                            Tabel Tema
                        </p>
                    </a>
                </li>
                @if (Auth::user()->status == 0)
                    <li class="nav-header">SUPER ADMIN ACCESS</li>
                    <li class="nav-item">
                        <a href="{{ url('dashboard/user') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-users"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link btn btn-outline-dark">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
