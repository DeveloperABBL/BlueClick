<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title"><span data-key="t-menu">เมนู</span></li>

    <li class="nav-item">
        <a class="nav-link menu-link @if (Route::is('index')) active @endif" href="{{ route('index') }}">
            <i class="ri-honour-line"></i> <span data-key="t-widgets">หน้าแรก</span>
        </a>
        <a class="nav-link menu-link @if (Route::is('user_register.index')) active @endif" href="{{ route('user_register.index') }}">
            <i class="ri-honour-line"></i> <span data-key="t-widgets">รายการลงทะเบียน</span>
        </a>
    </li>

</ul>
