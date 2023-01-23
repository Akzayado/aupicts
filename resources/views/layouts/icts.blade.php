<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ICTS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/dist/css/adminlte.min.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('bootstrap-template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('bootstrap-template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/dist/css/adminlte.min.css') }}">
    <style type="text/css">
        @font-face {
            font-family: aup-font;
            src: url('{{ asset('fonts/DorovarFLF-Carolus.ttf') }}') format('truetype');
        }

        .header {
            line-height: 3%;
        }
    </style>
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('includes.navbar')
        @include('includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12 text-center header">
                                <h1 class="m-0" style="font-family: aup-font"> Adventist University of the
                                    Philippines
                                </h1>
                                <p>Information and Communication Technology Services</p>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('main-content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="{{ asset('bootstrap-template/dist/js/adminlte.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
