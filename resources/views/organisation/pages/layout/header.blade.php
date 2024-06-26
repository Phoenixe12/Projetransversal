<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Biobanque</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('organisation/dist/css/code.ionicframework.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('organisation/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('organisation/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('organisation/dist/css/adminlte.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('organisation/plugins/codemirror/theme/monokai.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/simplemde/simplemde.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('organisation/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('organisation/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('organisation/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href=".{{ asset('organisation/plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <!-- sweet alter -->
    <!---->
    <script src="{{ asset('organisation/build/js/sweetalert.min.js') }}"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('organisation/dist/css/material.icon.css') }}">

    <link href="{{ asset('organisation\plugins\bootstrap-table\dist\bootstrap-table.min.css') }}" rel="stylesheet">


</head>
<style>
    a {
        color: #048b54;
        text-decoration: none;
        background-color: transparent;
    }

    .sidebar-dark-primary .nav-sidebar.nav-legacy>.nav-item>.nav-link.active {
        border-color: #048b54;
    }

    a.nav-link:hover {
        color: #fad215;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center ">
            <img class="animation__shake"
                src="{{ asset('organisation/dist/img/pointvert-est-cadenas-a-code-bg0317_1-removebg-preview.png') }}"
                alt="AdminLTELogo" height="220" width="220">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-warning">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <!--  -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-th-large and-arrows-alt"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="dropdown-header">

                            <span>Admin</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="fa fa-user-circle mr-2" aria-hidden="true"></i>
                                <span>Mon profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Se déconnecter</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>


                    </a>
                </li>
            </ul>
            </li>
            <!--  -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#0b3544;">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('organisations/dist/img/logo.png') }}"
                    alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ auth()->user()->name }}</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar" style="background-color:#0b3544;">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="#" class="d-block fw-bold">eS-Fuel Management System</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('home.admin') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gestion Stations</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gestion Statuts</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!--Fin de   -->
                        <li class="nav-header"></li>
                        {{--
                          <li class="nav-item menu-open mt-2">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-circle fa-1.5x"></i>
                                <p class="fw-bold">

                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                        </li>
                        --}}
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>
                                    Se déconnecter
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none">
                                @csrf
                            </form>

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

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Main row -->

                    @yield('GestionPage')

                </div><!-- /.container-fluid -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2023-2024 <a href="#"><img class="animation__shake"
                        src="{{ asset('organisations/dist/img/logo.png') }}" alt="AdminLTELogo" height="80"
                        width="80" /></strong>
            All rights reserved.</a>

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('organisation/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('organisation/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('organisation/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('organisation/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('organisation/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('organisation/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('organisation/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('organisation/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('organisation/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- overlayScrollbars -->
    <script src="{{ asset('organisation/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('organisation/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('organisation/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('organisation/dist/js/pages/dashboard.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('organisation/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('organisation/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('organisation/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- jQuery -->
    <!-- Ekko Lightbox -->
    <script src="{{ asset('organisation/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <!-- Filterizr-->
    <script src="{{ asset('organisation/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('organisation/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset('organisation/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('organisation/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('organisation/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('organisation/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- Page specific script -->
    <script src="{{ asset('organisation\plugins\bootstrap-table\dist\bootstrap-table.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js">
    </script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
       <!-- Inclure la bibliothèque SheetJS (XLSX) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    @yield('script')

</body>

</html>
