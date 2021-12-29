<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} @yield('evo-title')</title>
    @yield('evo-style')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
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
            <a href="/" class="brand-link text-decoration-none">
                <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <div class="d-block text-white">{{ auth()->user()->full_name }}</div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <!-- User -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>Users
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                        </i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /User -->
                        <!-- Role -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>Roles
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('role.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                        </i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /Role -->
                        <!-- Candidate -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>Candidates
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('candidate.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                        </i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('candidate.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /Candidate -->
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('evo-menu')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('evo-main')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>App Version</b> {{ env('APP_VERSION') }} |
                <b>UI Version</b> {{ env('UI_VERSION') }}
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- AdminLTE -->
    <script src="/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <!-- <script src="/plugins/chart.js/Chart.min.js"></script> -->

    <!-- JAVASCRIPT -->
    @yield('evo-js')
</body>

</html>