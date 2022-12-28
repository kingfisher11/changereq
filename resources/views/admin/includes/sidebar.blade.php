<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-info" style="background-color: #192c69;"> 
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" title="sign out" data-toggle="modal" data-target="#modal-logout">
                <i style="font-size:16px" class="fas fa-sign-out-alt"></i>
            </a>
        </li>
        
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> --}}
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">e-Feedback</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block text-uppercase">{{auth()->user()->name}}</a>
                <a href="#" class="d-block text-uppercase">{{auth()->user()->userRole->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <p> MENU UTAMA</p>
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'tickets' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('tickets.index') }}">
                    <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>{{ __('Senarai Maklum Balas') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'tickets' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('tickets.index.resolved') }}">
                    <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>{{ __('Selesai') }}</p>
                    </a>
                </li>
            </ul>
        <br>
        <p> TETAPAN</p>
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

                <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                    <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-bell"></i>
                        <p>{{ __('Status') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'departments' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('department.index') }}">
                    <i class="nav-icon fas fa-building"></i>
                        <p>{{ __('Jabatan') }}</p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="nav-icon fas fa-users"></i>
                        <p>{{ __('Pengguna') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
<!-- /.sidebar -->
</aside>