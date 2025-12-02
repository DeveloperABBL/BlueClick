<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title"><span data-key="t-menu">เมนู</span></li>

    <li class="nav-item">
        <a class="nav-link menu-link @if (Route::is('empty')) active @endif" href="{{ route('empty') }}">
            <i class="ri-honour-line"></i> <span data-key="t-widgets">บทความ</span>
        </a>
    </li>

</ul>
