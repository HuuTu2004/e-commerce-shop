<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <base href="/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS -->
    <link rel="stylesheet" href="assetadmin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assetadmin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assetadmin/dist/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        @include('layouts.top-bar')
        <aside class="main-sidebar">
            <section class="sidebar">
                <x-aside />
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>@yield('title')</h1>
            </section>
            <section class="content">
                <div class="box">
                    @yield('content')
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.3
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All
            rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <!-- Recent Activity Content -->
                </div>
                <div class="tab-pane" id="control-sidebar-stats-tab">
                    <!-- Stats Tab Content -->
                </div>
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <!-- General and Chat Settings Content -->
                </div>
            </div>
        </aside>
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- JavaScript -->
    <script src="assetadmin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="assetadmin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assetadmin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="assetadmin/plugins/fastclick/fastclick.js"></script>
    <script src="assetadmin/dist/js/app.min.js"></script>
    <script src="assetadmin/dist/js/demo.js"></script>
    @yield('js')
</body>

</html>