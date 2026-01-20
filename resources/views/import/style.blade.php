<link rel="stylesheet" href="{{ asset('assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/aos/aos.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-4.1.0-rc.0/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

<link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/quill/quill.snow.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wdth,wght@62.5..100,100..900&display=swap"
    rel="stylesheet">

<!-- Daterangepicker CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- One of the following themes -->
<link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/classic.min.css') }}" />
<!-- 'classic' theme -->
<link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
<!-- 'monolith' theme -->
<link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}" /> <!-- 'nano' theme -->

<!-- ================= BLUECLICK CUSTOM STYLES ================= -->
{{-- <style>
    :root {
        --bc-primary: #6fa3d6;
        --bc-primary-dark: #5a8cc2;
        --bc-gradient: linear-gradient(135deg, #b3cae2 0%, #8fb3d8 100%);
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f8f9fa;
    }

    /* ===== REMOVE BORDER / SHADOW ===== */
    .app-menu,
    .navbar-menu,
    .sidebar {
        border-right: none !important;
        box-shadow: 2px 0 8px rgba(161, 161, 161, 0.15);
    }

    #page-topbar {
        border-bottom: none !important;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08) !important;
    }

    /* ===== SIDEBAR COLOR ===== */
    .app-menu {
        background-color: #ffffff !important;
    }

    .navbar-menu .nav-link {
        color: #212529 !important;
        font-weight: 500;
    }

    .navbar-menu .nav-link:hover,
    .navbar-menu .nav-link.active {
        color: var(--bc-primary) !important;
    }

    .navbar-menu .nav-link.active::before {
        background-color: var(--bc-primary) !important;
    }

    /* ===== TOGGLE ICON (เหมือน Maxup) ===== */
    .toggle-icon-img {
        display: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
    }

    html[data-sidebar-size="sm"] .toggle-icon-line {
        display: none;
    }

    html[data-sidebar-size="sm"] .toggle-icon-img {
        display: inline-block;
    }

    /* ===== TOPBAR STYLING ===== */
    .topbar-user .btn {
        background: transparent;
        border: none;
        padding: 8px 16px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .topbar-user .btn:hover {
        background: #f0f4f8;
    }

    .header-profile-user {
        width: 40px;
        height: 40px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .topbar-user:hover .header-profile-user {
        border-color: var(--bc-primary);
        box-shadow: 0 0 0 4px rgba(111, 163, 214, 0.1);
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 12px 0;
        margin-top: 12px;
    }

    .dropdown-item {
        padding: 10px 20px;
        transition: all 0.2s ease;
        border-radius: 6px;
        margin: 2px 8px;
    }

    .dropdown-item:hover {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        color: var(--bc-primary);
        transform: translateX(4px);
    }

    .dropdown-divider {
        margin: 8px 12px;
        border-color: #e9ecef;
    }

    /* ===== LOGO STYLING ===== */
    .navbar-brand-box {
        padding: 24px 20px;
        background: var(--bc-gradient);
        text-align: center;
    }

    .logo-lg {
        font-size: 24px;
        font-weight: 700;
        color: white !important;
        letter-spacing: 0.5px;
    }

    /* ===== SCROLLBAR ===== */
    #scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    #scrollbar::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.02);
    }

    #scrollbar::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    #scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(0, 0, 0, 0.2);
    }

    /* ===== MENU ITEMS ===== */
    .menu-title {
        color: #8fa3b8;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 20px 24px 8px;
    }

    .menu-item {
        display: block;
        padding: 12px 24px;
        color: #495057;
        text-decoration: none;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
        font-size: 15px;
        font-weight: 500;
    }

    .menu-item:hover {
        background: #f0f4f8;
        color: var(--bc-primary);
        border-left-color: var(--bc-primary);
        padding-left: 28px;
    }

    .menu-item.active {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        color: var(--bc-primary);
        border-left-color: var(--bc-primary);
    }

    .menu-item i {
        margin-right: 12px;
        width: 20px;
        text-align: center;
    }

    /* ===== MAIN CONTENT ===== */
    .main-content {
        background: #f8f9fa;
    }

    .page-content {
        background: var(--bc-gradient);
        min-height: calc(100vh - 70px);
        padding: 40px 24px;
    }

    /* ===== DASHBOARD STYLES ===== */
    .dashboard-header {
        background: white;
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .dashboard-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .dashboard-header p {
        color: #7f8c8d;
        font-size: 15px;
        margin: 0;
    }

    .shortcut-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 30px;
    }

    .shortcut-card {
        background: white;
        border-radius: 16px;
        padding: 28px;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    }

    .shortcut-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--card-color), var(--card-color-dark));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .shortcut-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        border-color: var(--card-color);
    }

    .shortcut-card:hover::before {
        transform: scaleX(1);
    }

    .shortcut-card.blue {
        --card-color: #3498db;
        --card-color-dark: #2980b9;
    }

    .shortcut-card.green {
        --card-color: #2ecc71;
        --card-color-dark: #27ae60;
    }

    .shortcut-card.orange {
        --card-color: #e67e22;
        --card-color-dark: #d35400;
    }

    .shortcut-card.purple {
        --card-color: #9b59b6;
        --card-color-dark: #8e44ad;
    }

    .shortcut-card.red {
        --card-color: #e74c3c;
        --card-color-dark: #c0392b;
    }

    .shortcut-card.teal {
        --card-color: #1abc9c;
        --card-color-dark: #16a085;
    }

    .shortcut-icon {
        width: 70px;
        height: 70px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .shortcut-card:hover .shortcut-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .shortcut-card.blue .shortcut-icon {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        color: #2980b9;
    }

    .shortcut-card.green .shortcut-icon {
        background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
        color: #27ae60;
    }

    .shortcut-card.orange .shortcut-icon {
        background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        color: #d35400;
    }

    .shortcut-card.purple .shortcut-icon {
        background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
        color: #8e44ad;
    }

    .shortcut-card.red .shortcut-icon {
        background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
        color: #c0392b;
    }

    .shortcut-card.teal .shortcut-icon {
        background: linear-gradient(135deg, #e0f2f1 0%, #b2dfdb 100%);
        color: #16a085;
    }

    .shortcut-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .shortcut-desc {
        font-size: 14px;
        color: #95a5a6;
        margin: 0;
        line-height: 1.6;
    }

    .stats-section {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .stats-title {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .stat-item {
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .stat-value {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 14px;
        color: #7f8c8d;
    }

    @media (max-width: 768px) {
        .shortcut-grid {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
</style> --}}
<style>
    /* ================= UTILITY CLASSES ================= */
    .d-flex {
        display: flex;
    }

    .align-items-center {
        align-items: center;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .text-start {
        text-align: left;
    }

    .text-sm-end {
        text-align: right;
    }

    .d-none {
        display: none;
    }

    .d-xl-inline-block {
        display: inline-block;
    }

    .d-xl-block {
        display: block;
    }

    .fw-medium {
        font-weight: 500;
    }

    .fw-bold {
        font-weight: 700;
    }

    .fs-12 {
        font-size: 12px;
    }

    .fs-16 {
        font-size: 16px;
    }

    .text-muted {
        color: #6c757d;
    }

    .rounded-circle {
        border-radius: 50%;
    }

    .ms-xl-2 {
        margin-left: 0.5rem;
    }

    .ms-sm-3 {
        margin-left: 1rem;
    }

    .me-1 {
        margin-right: 0.25rem;
    }

    .px-3 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .col-sm-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    @media (min-width: 576px) {
        .d-sm-block {
            display: block !important;
        }
    }

    @media (min-width: 1200px) {
        .d-xl-inline-block {
            display: inline-block !important;
        }

        .d-xl-block {
            display: block !important;
        }
    }

    .page-content {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: calc(100vh - 70px);
        padding: 40px 24px;
    }

    .dashboard-header {
        background: white;
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .dashboard-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .dashboard-header p {
        color: #7f8c8d;
        font-size: 15px;
        margin: 0;
    }

    .shortcut-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 30px;
    }

    .shortcut-card {
        background: white;
        border-radius: 16px;
        padding: 28px;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    }

    .shortcut-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--card-color), var(--card-color-dark));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .shortcut-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        border-color: var(--card-color);
    }

    .shortcut-card:hover::before {
        transform: scaleX(1);
    }

    .shortcut-card.blue {
        --card-color: #3498db;
        --card-color-dark: #2980b9;
    }

    .shortcut-card.green {
        --card-color: #2ecc71;
        --card-color-dark: #27ae60;
    }

    .shortcut-card.orange {
        --card-color: #e67e22;
        --card-color-dark: #d35400;
    }

    .shortcut-card.purple {
        --card-color: #9b59b6;
        --card-color-dark: #8e44ad;
    }

    .shortcut-card.red {
        --card-color: #e74c3c;
        --card-color-dark: #c0392b;
    }

    .shortcut-card.teal {
        --card-color: #1abc9c;
        --card-color-dark: #16a085;
    }

    .shortcut-icon {
        width: 70px;
        height: 70px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .shortcut-card:hover .shortcut-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .shortcut-card.blue .shortcut-icon {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        color: #2980b9;
    }

    .shortcut-card.green .shortcut-icon {
        background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
        color: #27ae60;
    }

    .shortcut-card.orange .shortcut-icon {
        background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        color: #d35400;
    }

    .shortcut-card.purple .shortcut-icon {
        background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
        color: #8e44ad;
    }

    .shortcut-card.red .shortcut-icon {
        background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
        color: #c0392b;
    }

    .shortcut-card.teal .shortcut-icon {
        background: linear-gradient(135deg, #e0f2f1 0%, #b2dfdb 100%);
        color: #16a085;
    }

    .shortcut-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .shortcut-desc {
        font-size: 14px;
        color: #95a5a6;
        margin: 0;
        line-height: 1.6;
    }

    .stats-section {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .stats-title {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .stat-item {
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .stat-value {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 14px;
        color: #7f8c8d;
    }

    @media (max-width: 768px) {
        .shortcut-grid {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>
