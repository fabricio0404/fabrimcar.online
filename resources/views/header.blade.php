<!DOCTYPE html>
<html lang="en">

<head>
    @include('styles')
</head>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{!! asset('dist/img/AdminLTELogo.png') !!}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('incomesForDay') }}" class="nav-link">Ingresos</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('egressesForDay') }}" class="nav-link">Gastos</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('categories') }}" class="nav-link">Categorías</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('accounts') }}" class="nav-link">Cuentas</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                {{--  Full-Screen  --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item" style="margin-bottom: 50px;">

                            <a href="#" class="nav-link">
                                <p>
                                    <img src="dist/img/user2-160x160.png" class="img-circle elevation-2"
                                        alt="User Image" width="50">
                                    <div>{{ Auth::user()->name }}</div>
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('incomesForDay') }}" class="nav-link">
                                <i class="fas fa-hand-holding-usd"></i>
                                <p>
                                    Ingresos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('egressesForDay') }}" class="nav-link">
                                <i class="fas fa-share"></i>
                                <p>
                                    Egresos      
                                </p>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories') }}" class="nav-link">
                                <i class="fa fa-solid fa-list"></i>
                                <p>
                                    Categorías
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accounts') }}" class="nav-link">
                                <i class="fas fa-wallet"></i>
                                <p>
                                    Cuentas
                                </p>
                            </a>

                        </li>
                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

</body>

</html>
