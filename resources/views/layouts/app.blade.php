<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>DOA - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" /> --}}
        {{-- <meta content="Coderthemes" name="author" /> --}}
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <link href="/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <style>
        .logo-box h5{
            line-height: 1.3rem
        }
    </style>

    @yield('local_css')

    <body class="left-side-menu-dark">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- LOGO -->
                    <div class="logo-box pt-2">
                        <h5 class="text-light">
                            Sistem Maklumat Rekod Pendaftaran
                        </h5>
                        {{-- <a href="index.html" class="logo">
                            <span class="logo-lg">
                                <img src="/assets/images/logo-dark.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">Highdmin</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">H</span> -->
                                <img src="/assets/images/logo-sm.png" alt="" height="24">
                            </span>
                        </a> --}}
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        {{-- <img src="/assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle" height="48"> --}}
                        {{-- <div class="dropdown">
                            <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">Maxine Kennedy</a>
                        </div>
                        <p class="text-muted">Admin Head</p> --}}
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">MENU UTAMA</li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-clipboard"></i>
                                    <span>Rekod Maklumat Am</span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('main.syarikat') }}">Syarikat {{--<span class="badge badge-blue float-right">13</span>--}}</a></li>
                                    <li><a href="apps-tickets.html">Agen {{--<span class="badge badge-blue float-right">13</span>--}}</a></li>
                                    <li><a href="apps-taskboard.html">Produk {{--<span class="badge badge-blue float-right">13</span>--}}</a></li>
                                    <li><a href="apps-task-detail.html">Perawis Aktif {{--<span class="badge badge-blue float-right">13</span>--}}</a></li>
                                    <li><a href="apps-contacts.html">Pembekal {{--<span class="badge badge-blue float-right">13</span>--}}</a></li>
                                    <li><a href="apps-projects.html">Pengilang {{--<span class="badge badge-blue float-right">13</span>--}}</a></li>
                                    <li><a href="apps-companies.html">Invoicing {{--<span class="badge badge-blue float-right">13</span>--}}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('form.syarikat') }}">
                                    <i class="fe-edit"></i>
                                    {{-- <span class="badge badge-danger float-right">3</span> --}}
                                    <span>Pendaftaran (Borang A)</span>
                                </a>
                            </li>

                            <li class="menu-title">LAIN-LAIN</li>

                            {{-- <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-layers"></i>
                                    <span> Rekod Maklumat Am </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="apps-calendar.html">Kilang</a></li>
                                    <li><a href="apps-tickets.html">Tickets</a></li>
                                    <li><a href="apps-taskboard.html">Task Board</a></li>
                                    <li><a href="apps-task-detail.html">Task Detail</a></li>
                                    <li><a href="apps-contacts.html">Contacts</a></li>
                                    <li><a href="apps-projects.html">Projects</a></li>
                                    <li><a href="apps-companies.html">Companies</a></li>
                                    <li><a href="apps-file-manager.html">File Manager</a></li>
                                </ul>
                            </li> --}}

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">

                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topnav-menu float-right mb-0">

                            {{-- <li class="d-none d-sm-block">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit">
                                                    <i class="fe-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li> --}}
        
                            {{-- <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fe-bell noti-icon"></i>
                                    <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-right">
                                                <a href="" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                                        </h5>
                                    </div>

                                    <div class="slimscroll noti-scroll">

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin Dashboard<small class="text-muted">1 min ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                            <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                            <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-heart"></i></div>
                                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                        </a>

                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all
                                        <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li> --}}

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    <span class="pro-user-name ml-1">
                                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> 
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-user"></i> <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                        <i class="fe-log-out"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            {{-- <li class="dropdown notification-list">
                                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                                    <i class="fe-settings noti-icon"></i>
                                </a>
                            </li> --}}
                        </ul>

                        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                            <li>
                                <button class="button-menu-mobile disable-btn">
                                    <i class="fe-menu"></i>
                                </button>
                            </li>

                            @yield('breadcrumbs')
                            {{-- <li>
                                <h4 class="page-title-main">Dashboard</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">DOA</a></li>
                                    <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                                    <li class="breadcrumb-item active">Dark Menu</li>
                                </ol>
                            </li> --}}
        
                        </ul>
                    </div>
                    <!-- end Topbar -->



                   
                <div class="content">
                      
                    @yield('contents')
                    <!-- Start Content-->
                    {{-- <div class="container-fluid">

                        
                    </div> <!-- end container-fluid --> --}}

                </div> <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                              2019 - 2021 &copy; DOA Web Application
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>

        <script src="/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <!-- Flot chart -->
        <script src="/assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="/assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="/assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="/assets/libs/flot-charts/jquery.flot.resize.js"></script>
        <script src="/assets/libs/flot-charts/jquery.flot.pie.js"></script>
        <script src="/assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
        <script src="/assets/libs/flot-charts/curvedLines.js"></script>
        <script src="/assets/libs/flot-charts/jquery.flot.axislabels.js"></script>

         <!-- KNOB JS -->
         <script src="/assets/libs/jquery-knob/jquery.knob.min.js"></script>

         <script src="/assets/js/pages/dashboard.init.js"></script>


        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>

        @yield('local_js')
        
    </body>
</html>