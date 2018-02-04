<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/material/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="/material/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="/material/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="/material/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/material/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="wrapper">
    @include('layouts.sidebar-menu')
    <div class="main-panel">

        @include('layouts.navbar')

        @yield('content')

        @include('layouts.footer')

    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="/material/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/material/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/material/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="/material/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="/material/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="/material/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/material/js/bootstrap-notify.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="/material/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="/material/js/demo.js"></script>
<script src="/js/common.js"></script>
@yield('js')
</html>