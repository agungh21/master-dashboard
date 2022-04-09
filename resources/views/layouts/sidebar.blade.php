<?php
$umum = $settings['umum'];
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> --}}
        <i class="fas fa-hdd mr-2 ml-3"></i>
        <span class="brand-text font-weight-light">{{ $umum['name_app'] }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar mt-3">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link {{ $title == 'Master' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user') }}"
                                class="nav-link {{ $title == 'User' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-palette"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link {{ $title == 'Pengaturan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.common') }}"
                                class="nav-link {{ $title == 'Umum' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-card-alt"></i>
                                <p>
                                    Umum
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="
                         nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
