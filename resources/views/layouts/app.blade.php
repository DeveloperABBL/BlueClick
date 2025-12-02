<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Laravel Tutorial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    @include('layouts.partials.app.style')
    @stack('styles')
</head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('logo.svg') }}" alt="" height="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('logo.svg') }}" alt="" height="50">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('logo.svg') }}" alt="" height="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('logo.svg') }}" alt="" height="50">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                            <span></span>
                            <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ Auth::user()->role }}</span>
                                </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">สวัสดี {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h6>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">โปรไฟล์</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                @csrf
                                </form>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-logout">ออกจากระบบ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('logo.svg') }}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('logo.svg') }}" alt="" height="50">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('logo.svg') }}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('logo.svg') }}" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu"></div>
                    @include('layouts.partials.app.menu')
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    @include('layouts.partials.app.footer')

    @include('layouts.partials.app.script')

    @stack('scripts')

</body>
<script>$(document).ready(function() {
    $("#topnav-hamburger-icon").click(function() {
        $(".app-menu").toggleClass("show");  // แสดง/ซ่อน sidebar
        $(".vertical-overlay").toggle();      // แสดง overlay
    });

    $(".vertical-overlay").click(function() {
        $(".app-menu").removeClass("show");
        $(this).hide();
    });
});
</script>
<style>.app-menu {
    transition: all 0.3s;
    left: -250px;
    position: fixed;
    top: 0;
    bottom: 0;
    width: 250px;
    z-index: 999;
}
.app-menu.show {
    left: 0;
}
.vertical-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.4);
    z-index: 998;
}
</style>
</html>

