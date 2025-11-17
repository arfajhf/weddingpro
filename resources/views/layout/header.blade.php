<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/images/favicon.png') }}">
    <title>@yield('title', 'Wedding')</title>
    <!-- Custom CSS -->
    <link href="{{ url('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ url('dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        {{-- navbar --}}
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="index.html" class="logo">
                            <!-- Logo text -->
                            <span class="logo-text">
                                <h3 class="text-secondary">WeddingPro</h3>
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)"
                            data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent"
                    style="background-color: rgb(171, 171, 171);">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark text-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic text-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('assets/images/users/2.jpg') }}" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ auth()->user()->name }} <i
                                        class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="{{ url('assets/images/users/2.jpg') }}" alt="user"
                                            class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ auth()->user()->name }}</h4>
                                        <p class=" m-b-0">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}"
                                        onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                                        </button>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        {{-- sidebar --}}
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Personal</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('dashboard') }}" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        @if (auth()->user()->role === 'admin')
                            <li class="nav-small-cap">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Management Pelanggan</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('get.user') }}" aria-expanded="false">
                                    <i class="mdi mdi-account-circle"></i>
                                    <span class="hide-menu">Pelanggan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="table-responsive.html" aria-expanded="false">
                                    <i class="mdi mdi-border-style"></i>
                                    <span class="hide-menu">Undangan</span>
                                </a>
                            </li>

                            <li class="nav-small-cap">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Management Penjualan</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="mdi mdi-trending-up"></i>
                                    <span class="hide-menu">Pembayaran</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="{{ route('payment.konfir') }}" class="sidebar-link">
                                            <i class="mdi mdi-arrange-bring-to-front"></i>
                                            <span class="hide-menu">Konfirmasi</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('payment.selesai') }}" class="sidebar-link">
                                            <i class="mdi mdi-arrange-send-to-back"></i>
                                            <span class="hide-menu">Selesai</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @elseif (auth()->user()->role === 'user')
                            <li class="nav-small-cap">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Management Undangan</span>
                            </li>

                            @if ($latest_payment && $latest_payment->status == 1)
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('undangan.index') }}" aria-expanded="false">
                                        <i class="mdi mdi-border-style"></i>
                                        <span class="hide-menu">Undangan Saya</span>
                                    </a>
                                </li>
                            @else
                                @if ($latest_payment && $latest_payment->status == 0)
                                    <li class="sidebar-item">
                                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{ route('riwayat') }}" aria-expanded="false">
                                            <i class="mdi mdi-history"></i>
                                            <span class="hide-menu">Riwayat Langganan</span>
                                        </a>
                                    </li>
                                @endif

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('berlangganan') }}" aria-expanded="false">
                                        <i class="mdi mdi-cart"></i>
                                        <span class="hide-menu">Berlangganan Sekarang</span>
                                    </a>
                                </li>
                            @endif
                        @endif

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        {{-- cotent --}}
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="javascript:void(0)">Wedding Project</a>.
            </footer>
        </div>
    </div>


    {{-- footer --}}
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ url('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ url('dist/js/app.min.js') }}"></script>
    <script src="{{ url('dist/js/app.init.dark.js') }}"></script>
    <script src="{{ url('dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ url('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ url('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ url('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ url('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!--c3 charts -->
    <script src="{{ url('assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ url('assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ url('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ url('dist/js/pages/dashboards/dashboard1.js') }}"></script>

    <script src="{{ url('js/app.js') }}"></script>
</body>

</html>
