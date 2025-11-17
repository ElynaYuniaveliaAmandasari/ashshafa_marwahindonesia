<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard') - ASH SHAFA</title>

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">

    @guest
        {{-- CSS untuk halaman login/register (minimal) --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('mono_assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
        <style>
            :root {
                --shafa-primary: #7A0000;
                --shafa-primary-dark: #5A0000;
            }

            body {
                background: var(--shafa-primary);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Karla', sans-serif;
                padding: 20px;
            }

            .auth-container {
                width: 100%;
                max-width: 480px;
                animation: fadeInUp 0.6s ease-out;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .auth-card {
                border: none;
                border-radius: 20px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                overflow: hidden;
                background: white;
            }

            /* ====== HEADER ====== */
            .auth-header {
                background: var(--shafa-primary);
                color: white;
                padding: 40px 30px;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            .auth-header::before {
                content: '';
                position: absolute;
                top: -50%;
                right: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
                animation: pulse 15s ease-in-out infinite;
            }

            @keyframes pulse {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.1);
                }
            }

            .logo-wrapper {
                position: relative;
                z-index: 1;
                margin-bottom: 20px;
            }

            .auth-logo {
                max-height: 70px;
                filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
                animation: float 3s ease-in-out infinite;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            .auth-title {
                margin: 0;
                font-weight: 700;
                font-size: 28px;
                position: relative;
                z-index: 1;
            }

            .auth-subtitle {
                margin: 10px 0 0 0;
                opacity: 0.9;
                font-size: 15px;
                position: relative;
                z-index: 1;
            }

            /* ====== BODY ====== */
            .auth-body {
                padding: 45px 40px;
                background: white;
            }

            .auth-form {
                position: relative;
            }

            /* ====== FORM ELEMENTS ====== */
            .form-label {
                font-weight: 600;
                color: #2c2c2c;
                margin-bottom: 10px;
                font-size: 14px;
                display: block;
            }

            .input-wrapper {
                position: relative;
                display: flex;
                align-items: center;
            }

            .input-icon {
                position: absolute;
                left: 0;
                top: 0;
                height: 100%;
                width: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--shafa-primary);
                font-size: 20px;
                z-index: 2;
                pointer-events: none;
            }

            .form-control-lg {
                padding: 14px 50px 14px 50px !important;
                font-size: 15px !important;
                height: auto !important;
                border: 2px solid #e0e0e0 !important;
                border-radius: 12px !important;
                transition: all 0.3s ease !important;
                background: #f8f9fa !important;
                width: 100%;
            }

            .form-control-lg:focus {
                background: white !important;
                border-color: var(--shafa-primary) !important;
                box-shadow: 0 0 0 4px rgba(122, 0, 0, 0.1) !important;
                outline: none !important;
            }

            .form-control-lg::placeholder {
                color: #aaa;
                font-size: 14px;
            }

            .toggle-password {
                position: absolute;
                right: 0;
                top: 0;
                height: 100%;
                width: 48px;
                background: transparent;
                border: none;
                color: #999;
                font-size: 20px;
                cursor: pointer;
                z-index: 2;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .toggle-password:hover {
                color: var(--shafa-primary);
            }

            .invalid-feedback {
                display: block;
                margin-top: 8px;
                font-size: 13px;
                color: #dc3545;
            }

            /* ====== CHECKBOX ====== */
            .custom-checkbox {
                display: flex;
                align-items: center;
            }

            .custom-checkbox .form-check-input {
                width: 20px;
                height: 20px;
                border: 2px solid #d0d0d0;
                border-radius: 6px;
                cursor: pointer;
                margin-right: 10px;
                flex-shrink: 0;
            }

            .custom-checkbox .form-check-input:checked {
                background-color: var(--shafa-primary);
                border-color: var(--shafa-primary);
            }

            .custom-checkbox .form-check-label {
                font-size: 14px;
                color: #555;
                cursor: pointer;
                margin-bottom: 0;
            }

            /* ====== BUTTON ====== */
            .btn-auth {
                background: var(--shafa-primary);
                border: none;
                padding: 15px 30px;
                font-weight: 600;
                font-size: 16px;
                transition: all 0.3s ease;
                color: white;
                border-radius: 12px;
                position: relative;
                overflow: hidden;
                width: 100%;
            }

            .btn-auth::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.2);
                transform: translate(-50%, -50%);
                transition: width 0.6s, height 0.6s;
            }

            .btn-auth:hover::before {
                width: 300px;
                height: 300px;
            }

            .btn-auth:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(122, 0, 0, 0.4);
                color: white;
            }

            .btn-auth:active {
                transform: translateY(0);
            }

            /* ====== LINK ====== */
            .auth-link {
                color: var(--shafa-primary);
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
                font-size: 15px;
            }

            .auth-link:hover {
                color: var(--shafa-primary-dark);
                text-decoration: none;
                transform: translateX(5px);
            }

            /* ====== DIVIDER ====== */
            .auth-divider {
                position: relative;
                text-align: center;
                margin: 30px 0;
            }

            .auth-divider::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                height: 1px;
                background: #e0e0e0;
            }

            .auth-divider span {
                position: relative;
                background: white;
                padding: 0 20px;
                color: #999;
                font-size: 13px;
                font-weight: 500;
            }

            /* ====== FOOTER ====== */
            .auth-footer {
                background: #f8f9fa;
                padding: 20px;
                text-align: center;
                border-top: 1px solid #e9ecef;
            }

            .auth-footer p {
                color: #6c757d;
                font-size: 13px;
            }

            /* ====== ALERT ====== */
            .alert {
                border-radius: 12px;
                border: none;
                padding: 15px 20px;
                margin-bottom: 25px;
                animation: slideInDown 0.4s ease-out;
            }

            @keyframes slideInDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .alert-danger {
                background: #ffe6e6;
                color: #cc3333;
            }

            .alert-success {
                background: #e6ffe6;
                color: #33cc33;
            }

            .text-muted {
                font-size: 14px;
                color: #888;
            }

            /* ====== RESPONSIVE ====== */
            @media (max-width: 576px) {
                .auth-container {
                    padding: 10px;
                }

                .auth-body {
                    padding: 35px 25px;
                }

                .auth-header {
                    padding: 35px 20px;
                }

                .auth-title {
                    font-size: 24px;
                }

                .form-control-lg {
                    font-size: 14px !important;
                    padding: 12px 45px 12px 45px !important;
                }
            }
        </style>
    @else
        {{-- CSS untuk halaman admin (lengkap dengan sidebar) --}}
        <link href="{{ asset('mono_assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('mono_assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
        <link href="{{ asset('mono_assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
        <link href="{{ asset('mono_assets/plugins/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}"
            rel="stylesheet" />
        <link href="{{ asset('mono_assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
        <link id="main-css-href" rel="stylesheet" href="{{ asset('mono_assets/css/style.css') }}" />

        {{-- Shafa Theme CSS --}}
        <link href="{{ asset('assets/css/shafa-theme.css') }}" rel="stylesheet" />

        <style>
            .sidebar-dark .sidebar-inner .nav .sub-menu>li.active>.sidenav-item-link {
                background: var(--shafa-primary) !important;
                color: #ffffff;
                font-weight: 700;
            }

            .sidebar-dark .sidebar-inner .nav .sub-menu>li.active>.sidenav-item-link:hover {
                background: #58418a !important;
                color: #ffffff;
            }
        </style>
    @endguest

    <link href="{{ asset('assets/img/logo-ash-shafa-maroon.png') }}" rel="shortcut icon" />

    @auth
        <script src="{{ asset('mono_assets/plugins/nprogress/nprogress.js') }}"></script>
    @endauth
</head>

<body class="{{ auth()->check() ? 'navbar-fixed sidebar-fixed theme-shafa' : 'auth-page' }}" id="body">

    @auth
        <script>
            NProgress.configure({
                showSpinner: false
            });
            NProgress.start();
        </script>
        <div id="toaster"></div>
    @endauth

    @guest
        {{-- ============================================ --}}
        {{-- LAYOUT UNTUK GUEST (Login/Register)        --}}
        {{-- ============================================ --}}
        <div class="auth-container">
            @yield('content')
        </div>
    @else
        {{-- ============================================ --}}
        {{-- LAYOUT UNTUK AUTHENTICATED USER (Admin)    --}}
        {{-- ============================================ --}}
        <div class="wrapper">

            <aside class="left-sidebar sidebar-dark" id="left-sidebar">
                <div id="sidebar" class="sidebar sidebar-with-footer">
                    <div class="app-brand">
                        <a href="{{ url('/admin') }}"
                            style="display: flex; justify-content: center; align-items: center; padding: 10px 0;">
                            <img src="{{ asset('assets/img/logo-ash-shafa-putih.png') }}" alt="Logo"
                                style="height: 45px; width: auto;">
                        </a>
                    </div>

                    <div class="sidebar-left" data-simplebar style="height: 100%;">
                        <ul class="nav sidebar-inner" id="sidebar-menu">

                            <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.dashboard') }}">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span class="nav-text">Dashboard</span>
                                </a>
                            </li>

                            <li class="has-sub {{ Request::routeIs('admin.packages.*') ? 'active expand' : '' }}">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                    data-target="#packages-menu"
                                    aria-expanded="{{ Request::routeIs('admin.packages.*') ? 'true' : 'false' }}"
                                    aria-controls="packages-menu">
                                    <i class="mdi mdi-briefcase-outline"></i>
                                    <span class="nav-text">Manajemen Paket</span> <b class="caret"></b>
                                </a>

                                <ul class="collapse {{ Request::routeIs('admin.packages.*') ? 'show' : '' }}"
                                    id="packages-menu" data-parent="#sidebar-menu">
                                    <div class="sub-menu">

                                        @php
                                            $currentCategory = request()->query('category');
                                        @endphp

                                        <li
                                            class="{{ !$currentCategory && Request::routeIs('admin.packages.index') ? 'active' : '' }}">
                                            <a class="sidenav-item-link" href="{{ route('admin.packages.index') }}">
                                                <span class="nav-text">Semua Paket</span>
                                            </a>
                                        </li>
                                        <li class="{{ $currentCategory == 'umroh' ? 'active' : '' }}">
                                            <a class="sidenav-item-link"
                                                href="{{ route('admin.packages.index', ['category' => 'umroh']) }}">
                                                <span class="nav-text">Paket Umroh</span>
                                            </a>
                                        </li>
                                        <li class="{{ $currentCategory == 'haji' ? 'active' : '' }}">
                                            <a class="sidenav-item-link"
                                                href="{{ route('admin.packages.index', ['category' => 'haji']) }}">
                                                <span class="nav-text">Paket Haji</span>
                                            </a>
                                        </li>
                                        <li class="{{ $currentCategory == 'wisata-religi' ? 'active' : '' }}">
                                            <a class="sidenav-item-link"
                                                href="{{ route('admin.packages.index', ['category' => 'wisata-religi']) }}">
                                                <span class="nav-text">Wisata Religi</span>
                                            </a>
                                        </li>
                                        <li class="{{ $currentCategory == 'produk-lain' ? 'active' : '' }}">
                                            <a class="sidenav-item-link"
                                                href="{{ route('admin.packages.index', ['category' => 'produk-lain']) }}">
                                                <span class="nav-text">Produk Lain</span>
                                            </a>
                                        </li>

                                    </div>
                                </ul>
                            </li>

                            <li class="{{ Request::routeIs('admin.gallery.*') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.gallery.index') }}">
                                    <i class="mdi mdi-image"></i>
                                    <span class="nav-text">Manajemen Galeri</span>
                                </a>
                            </li>

                            <li class="{{ Request::is('/') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ url('/') }}" target="_blank">
                                    <i class="mdi mdi-web"></i>
                                    <span class="nav-text">Lihat Website</span>
                                </a>
                            </li>

                            {{-- Logout Menu --}}
                            {{-- <li>
                                <form action="{{ route('admin.logout') }}" method="POST" id="logout-form">
                                    @csrf
                                    <a class="sidenav-item-link" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="mdi mdi-logout"></i>
                                        <span class="nav-text">Logout</span>
                                    </a>
                                </form>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </aside>

            <div class="page-wrapper">

                <header class="main-header" id="header">
                    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                        <button id="sidebar-toggler" class="sidebar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                        <span class="page-title">@yield('page_title', 'Dashboard')</span>

                        <div class="navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="dropdown user-menu">
                                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                        <i class="mdi mdi-account"></i>
                                        <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-footer">
                                            <form action="{{ route('admin.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="mdi mdi-logout"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>

                <div class="content-wrapper">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>

                <footer class="footer mt-auto">
                    <div class="copyright bg-white">
                        <p>
                            &copy; <span id="copy-year"></span> Copyright ASH SHAFA MARWAH INDONESIA.
                        </p>
                    </div>
                    <script>
                        var d = new Date();
                        var year = d.getFullYear();
                        document.getElementById("copy-year").innerHTML = year;
                    </script>
                </footer>

            </div>
        </div>
    @endguest

    {{-- Scripts --}}
    @guest
        {{-- Script minimal untuk guest --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @else
        {{-- Script lengkap untuk admin --}}
        <script src="{{ asset('mono_assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('mono_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('mono_assets/plugins/simplebar/simplebar.min.js') }}"></script>
        <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
        <script src="{{ asset('mono_assets/plugins/toaster/toastr.min.js') }}"></script>
        <script src="{{ asset('mono_assets/js/mono.js') }}"></script>
        <script src="{{ asset('mono_assets/js/custom.js') }}"></script>
        <script src="{{ asset('mono_assets/plugins/apexcharts/apexcharts.js') }}"></script>
        <script src="{{ asset('mono_assets/js/chart.js') }}"></script>
        <script src="{{ asset('mono_assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('mono_assets/plugins/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}">
        </script>

        {{-- Shafa Theme JS --}}
        <script src="{{ asset('assets/js/shafa-theme.js') }}"></script>
    @endguest

    @stack('scripts')
    @yield('scripts')
</body>

</html>