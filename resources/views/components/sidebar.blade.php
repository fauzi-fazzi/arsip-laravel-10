<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Menu Heading (Core)-->
            <div class="sidenav-menu-heading">Core</div>
            <!-- Sidenav Accordion (Dashboard)-->
            <a class="nav-link {{ Request::is('home/*') || Request::is('home') ? 'active' : '' }}"
                href="{{ url('home') }}">
                <div class="nav-link-icon"><i data-feather="home"></i></div>
                Dashboard
            </a>
            <!-- Sidenav Heading (App Views)-->
            <div class="sidenav-menu-heading">Interface</div>
            <!-- Sidenav Accordion (Pages)-->
            <a class="nav-link {{ Request::is('arsip/*') || Request::is('arsip') ? 'active' : '' }}"
                href="{{ url('arsip') }}">
                <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                Data Arsip
            </a>

            <!-- Sidenav Heading (Addons)-->
            <div class="sidenav-menu-heading">Account</div>
            <!-- Sidenav Link (Charts)-->
            <a class="nav-link {{ Request::is('admin/*') || Request::is('admin') ? 'active' : '' }}"
                href="{{ url('admin') }}">
                <div class="nav-link-icon"><i data-feather="settings"></i></div>
                Setting
            </a>
            <!-- Sidenav Link (Tables)-->
            <a class="nav-link" href="{{ url('logout') }}">
                <div class="nav-link-icon"><i data-feather="log-out"></i></div>
                Logout
            </a>
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title">{{ Auth::user()->username }}</div>
        </div>
    </div>
</nav>
