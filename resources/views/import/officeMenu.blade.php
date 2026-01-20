<ul class="navbar-nav" id="navbar-nav">

    <li class="menu-title"><span data-key="t-menu">เมนูหลัก</span></li>

    <li class="nav-item">
        <a class="nav-link menu-link active" href="#">
            <i class="ri-home-2-line"></i> <span data-key="t-homes">หน้าแรก</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#">
            <i class="ri-dashboard-fill"></i> <span data-key="t-dashboards">Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link collapsed" href="#sidebarUserRegister" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarUserRegister">
            <i class="ri-folder-user-fill"></i> <span data-key="t-sidebarUserRegister">ข้อมูลทะเบียน</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarUserRegister">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        ผู้ใช้งานระบบ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('companies.pending') }}" class="nav-link">
                        รายการรออนุมัติ
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="menu-title"><span data-key="t-menu">การจัดการ</span></li>

    <li class="nav-item">
        <a class="nav-link menu-link collapsed" href="#sidebarSetting" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarSetting">
            <i class="ri-settings-4-fill"></i> <span data-key="t-sidebarSetting">ตั้งค่าระบบ</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarSetting">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-key="t-analytics">
                        ตั้งค่าข้อมูล
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        ตั้งค่าทั่วไป
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="menu-title"><span data-key="t-menu">รายงาน</span></li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#">
            <i class="ri-bar-chart-box-fill"></i> <span data-key="t-reports">รายงานสรุป</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#">
            <i class="ri-file-chart-fill"></i> <span data-key="t-monthlyReports">รายงานประจำเดือน</span>
        </a>
    </li>

</ul>
