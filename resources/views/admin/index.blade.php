<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('backend.title') }}</title>

    <!-- Bootstrap -->
    <link href="bower_dl/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="bower_dl/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="bower_dl/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="bower_dl/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="bower_dl/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="bower_dl/gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="bower_dl/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="bower_dl/gentelella/build/css/custom.min.css" rel="stylesheet">
    <!-- DataTables Style-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

    <!-- Pnotify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.css">
    <link rel="stylesheet" href="/css/pnotify.buttons.css">
    <!-- sweetalert -->
    <link rel="stylesheet" type="text/css" href="/bower_dl/sweetalert/dist/sweetalert.css">
</head>

<body class="nav-md">

    <div id="app"></div>



    <!-- jQuery -->
    <script src="bower_dl/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="bower_dl/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- pnotify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.js"></script>
    <script src="{{ asset('js/pnotify.buttons.js') }}"></script>

    <!-- FastClick -->
    <script src="bower_dl/gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="bower_dl/gentelella/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="bower_dl/gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="bower_dl/gentelella/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="bower_dl/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="bower_dl/gentelella/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="bower_dl/gentelella/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="bower_dl/gentelella/vendors/Flot/jquery.flot.js"></script>
    <script src="bower_dl/gentelella/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="bower_dl/gentelella/vendors/Flot/jquery.flot.time.js"></script>
    <script src="bower_dl/gentelella/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="bower_dl/gentelella/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="bower_dl/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="bower_dl/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="bower_dl/gentelella/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="bower_dl/gentelella/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="bower_dl/gentelella/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="bower_dl/gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="bower_dl/gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="bower_dl/gentelella/vendors/moment/min/moment.min.js"></script>
    <script src="bower_dl/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- sweetalert -->
    <script src="/bower_dl/sweetalert/dist/sweetalert.min.js"></script>
    <!--  vue.js components compiled file -->
    <script src="{{ asset('js/app.js') }}"></script>




</body>
</html>
