<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>RMC</title>
    <base href="/">
    <link rel="apple-touch-icon" sizes="60x60" href="admin_dash/app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="admin_dash/app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="admin_dash/app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="admin_dash/app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/Jharkhand_emblem.png">
    <link rel="shortcut icon" type="image/png" href="img/Jharkhand_emblem.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css"
        href="admin_dash/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="admin_dash/app-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="admin_dash/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- END Custom CSS-->

    <!-- datatable cdn -->
    <link rel="stylesheet" type="text/css" href="css/dataTables.min.css">
    <!-- datatable cdn -->
    @yield('pagecss')
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
    class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                                class="icon-menu5 font-large-1"></i></a></li>
                    <li class="nav-item"><a href="/dashboard" class="navbar-brand nav-link">
                            <!-- <img src="img/RMC_LOGO.png" alt="" class="brand-logo"> -->
                            <h3 class="rmc_hoarding brand-logo">RMC</h3>
                            <!-- <img alt="branding logo"
                                src="admin_dash/app-assets/images/logo/robust-logo-light.png"
                                data-expand="admin_dash/app-assets/images/logo/robust-logo-light.png"
                                data-collapse="admin_dash/app-assets/images/logo/robust-logo-small.png"
                                class="brand-logo"> -->
                        </a></li>
                    <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse"
                            data-target="#navbar-mobile" class="nav-link open-navbar-container"><i
                                class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content container-fluid">
                <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                    <ul class="nav navbar-nav">
                        <li class="nav-item hidden-sm-down"><a href="{{ url()->previous() }}"
                                class="btn btn-success upgrade-to-pro">RANCHI MUNICIPAL CORPORATION, MARKETING
                                SECTION</a></li>
                    </ul>
                    <ul class="nav navbar-nav float-xs-right">
                        <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown"
                                class="dropdown-toggle nav-link dropdown-user-link"><span
                                    class="avatar avatar-online"><img
                                        src="admin_dash/app-assets/images/portrait/small/avatar-s-1.png"
                                        alt="avatar"><i></i></span><span class="user-name">Guest
                                </span> </a>
                            <div class="dropdown-menu dropdown-menu-right"><a href="{{ route('profile.show') }}"
                                    class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="#"
                                    class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a><a href="#"
                                    class="dropdown-item"><i class="icon-clipboard2"></i> Task</a><a href="#"
                                    class="dropdown-item"><i class="icon-calendar5"></i> Calender</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();"><i
                                            class="icon-power3"></i> Logout</a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- sidebar-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
        <div class="main-menu-content">
            <!-- Notice -->
            <div class="card text-xs-center">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title mytitle">Notice</div>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title success"><i class="icon-check"></i> How to Apply</h4>
                        <p class="card-text">This page facilitates you to fill in registration form related to Market
                            Section, RMC.</p>
                        <p class="card-text">Please note that filling in the registration form is only an intimation to
                            RMC.
                            You may have to visit RMC office for further enquiry.</p>
                    </div>
                </div>
            </div>
            <!-- Notice -->
            <!-- Notice -->
            <div class="card text-xs-center">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title mytitle">Notice</div>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title success"><i class="icon-download5"></i> Downloads</h4>
                        <ul>
                            <li><a href="http://rmchams.com/Content/pdfs/jharkhand_advertisement_tax.pdf">Jharkhand Advertisement Tax</a></li>
                            <li><a href="">Lodge Banquet Notification</a></li>
                            <li><a href="">Regulations 18-04-17</a></li>
                            <li><a href="">List Of documents for application</a></li>
                            <li><a href="">Online Application and payment procedures of Advertisement Licenses for Ranchi Municipal Corporation</a></li>
                            <li><a href="">No Physical Visit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Notice -->
        </div>
    </div>
    <!-- / sidebar-->

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            @yield('app-content')
        </div>
    </div>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border">
        <p class="clearfix text-muted text-sm-center mb-0 px-2"><span
                class="float-md-left d-xs-block d-md-inline-block">Copyright &copy; 2022 <a href="" target="_blank"
                    class="text-bold-800 grey darken-2">RMC Ranchi Municipal Corporation</a>, All rights reserved.
            </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i
                    class="icon-heart5 pink"></i> <strong>Framework Futuristics Private Ltd</strong></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="admin_dash/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="admin_dash/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="admin_dash/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="admin_dash/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="admin_dash/app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- datatable cdn -->
    <script type="text/javascript" src="js/dataTables.min.js"></script>
    <!-- datatable cdn -->
    <!-- page script -->
    @yield('pagescript')
    <!-- page script -->
    <!-- custom script -->
    @yield('script')
    <!-- custom script -->
    <script>
        $(function () {
            $(".menu-toggle").click(function () {
                $(".brand-logo").toggle();
            });
        });

    </script>
</body>

</html>
