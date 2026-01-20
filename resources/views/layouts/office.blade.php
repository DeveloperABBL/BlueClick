<!doctype html>
<html lang="th" data-layout="vertical" data-layout-style="default" data-layout-position="fixed" data-topbar="light"
    data-sidebar="light" data-sidebar-size="sm-hover" data-layout-width="fluid">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'BlueClick')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BlueClick System" name="description" />
    <meta content="BlueLane" name="author" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    @include('import.style')
</head>

<body>

    <div id="layout-wrapper">

        <!-- ================= TOPBAR ================= -->
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">

                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="#" height="22">
                                </span>
                                <span class="logo-lg">
                                    <strong style="color: var(--bc-primary); font-size: 20px;">BlueClick</strong>
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="#" height="22">
                                </span>
                                <span class="logo-lg">
                                    <strong style="color: var(--bc-primary); font-size: 20px;">BlueClick</strong>
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="px-3 btn btn-sm fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span><span></span><span></span>
                            </span>
                        </button>

                    </div>

                    <!-- USER -->
                    <div class="d-flex align-items-center">
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn material-shadow-none" data-bs-toggle="dropdown">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="#">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block fw-medium">
                                            {{ auth()->user()->email ?? 'user@blueclick.com' }}
                                        </span>
                                        <span class="d-none d-xl-block fs-12">
                                            {{ auth()->user()->name ?? 'ผู้ใช้งาน' }}
                                        </span>
                                    </span>
                                </span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-account-circle me-1"></i> ข้อมูลส่วนตัว
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="logout()">
                                    <i class="mdi mdi-logout me-1"></i> ออกจากระบบ
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ================= SIDEBAR ================= -->
        <div class="app-menu navbar-menu">

            <div class="navbar-brand-box">

                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('favicon.ico') }}" height="40">
                    </span>
                    <span class="logo-lg">BlueClick</span>
                </a>

                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('favicon.ico') }}" height="40">
                    </span>
                    <span class="logo-lg">BlueClick</span>
                </a>

                <!-- TOGGLE (เหมือน Maxup) -->
                <button type="button" class="p-0 btn btn-sm fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line toggle-icon-line"></i>
                    <i class="toggle-icon-img" alt="BlueClick">
                </button>

            </div>

            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu"></div>
                    @include('import.officeMenu')
                </div>
            </div>

            <div class="sidebar-background"></div>
        </div>

        <div class="vertical-overlay"></div>

        <!-- ================= CONTENT ================= -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    @include('import.script')
    @yield('script')
    @stack('scripts')

    <script>
        function logout() {
            if (confirm('คุณต้องการออกจากระบบหรือไม่?')) {
                window.location.href = '/logout';
            }
        }
    </script>

</body>

</html>
