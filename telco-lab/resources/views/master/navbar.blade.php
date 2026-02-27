<style>
    /* Dropdown hover smooth */
    .navbar .dropdown {
        position: relative;
    }

    .navbar .dropdown-menu {
        display: block !important;
        /* override Bootstrap display */
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
        pointer-events: none;
        /* tidak bisa diklik saat hidden */
        margin-top: 0;
        border-radius: 12px;
        border: 1px solid #edf2f7;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 8px 0;
        right: 0;
        /* posisi di kanan */
        left: auto;
    }

    .navbar .dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        pointer-events: auto;
        /* bisa diklik saat muncul */
    }

    .navbar .dropdown-item {
        padding: 8px 20px;
        font-size: 0.9rem;
        color: #1e293b;
        transition: background 0.1s;
    }

    .navbar .dropdown-item:hover {
        background: #f1f5f9;
        color: #3b5d50;
    }

    .navbar .dropdown-item i {
        margin-right: 8px;
        color: #3b5d50;
        width: 18px;
    }

    /* Tanda panah kecil (opsional) */
    .dropdown-toggle::after {
        display: inline-block;
        margin-left: 0.5em;
        vertical-align: middle;
        content: "";
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-bottom: 0;
        border-left: 0.3em solid transparent;
        transition: transform 0.2s;
    }

    .dropdown:hover .dropdown-toggle::after {
        transform: rotate(-180deg);
    }
</style>

<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="index.html">TelcoLab<span>.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ Auth::check()
                            ? (Auth::user()->role === 'admin'
                                ? route('dashboard-admin')
                                : route('dashboard-user'))
                            : url('/') }}">Home</a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('resellers*') || request()->routeIs('admin.resellers*') ? 'active' : '' }}">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a class="nav-link" href="{{ route('admin.resellers.index') }}">Resellers</a>
                        @else
                            <a class="nav-link" href="{{ route('resellers.index') }}">Resellers</a>
                        @endif
                    @endauth
                    @guest
                        <a class="nav-link" href="{{ route('resellers.index') }}">Resellers</a>
                    @endguest
                </li>
                <li
                    class="nav-item {{ request()->routeIs('products*') || request()->routeIs('admin.products*') ? 'active' : '' }}">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a class="nav-link" href="{{ route('admin.products.index') }}">Products</a>
                        @else
                            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                        @endif
                    @endauth
                    @guest
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    @endguest
                </li>
                <li
                    class="nav-item {{ request()->routeIs('contacts*') || request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a class="nav-link" href="{{ route('admin.contacts.index') }}">Contacts</a>
                        @else
                            <a class="nav-link" href="{{ route('contacts.index') }}">Contacts</a>
                        @endif
                    @endauth
                    @guest
                        <a class="nav-link" href="{{ route('contacts.index') }}">Contacts</a>
                    @endguest
                </li>
            </ul>
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown"
                        role="button">
                        <img src="{{ asset('assets/images/user.svg') }}">
                        <span class="text-white fw-semibold">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @auth
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </a>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Header/Navigation -->
