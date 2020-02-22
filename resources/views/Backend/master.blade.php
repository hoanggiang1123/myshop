<!DOCTYPE html>
<html>

<head>
    @include('Backend.Elements.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Backend.Elements.topnav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Backend.Elements.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        @include('Backend.Elements.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('Backend.Elements.scripts')
</body>

</html>