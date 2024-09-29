<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="build/assets/" data-template="vertical-menu-template-free">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Map - Dashboard</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="build/assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

        <link rel="stylesheet" href="build/assets/vendor/fonts/boxicons.css" />

        <link rel="stylesheet" href="build/assets/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="build/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="build/assets/css/demo.css" />

        <link rel="stylesheet" href="build/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <link rel="stylesheet" href="build/assets/vendor/libs/apex-charts/apex-charts.css" />

        <script src="build/assets/vendor/js/helpers.js"></script>
        <script src="build/assets/js/config.js"></script>
    </head>

    <body>
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>
        
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                        <i class="bx bx-search fs-4 lh-0"></i>
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                            aria-label="Search..." />
                    </div>
                </div>
                <!-- /Search -->
        
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Place this tag where you want the button to render. -->
                    <li class="nav-item lh-1 me-3">
                        <a class="github-button" href="{{ route('dashboard') }}" data-icon="octicon-star" data-size="large"
                            data-show-count="true"
                            aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Dashboard</a>
                    </li>
        
                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="build/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="build/assets/img/avatars/1.png" alt
                                                    class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-semibold d-block">{{ Auth::user()->name ?? "User Name" }}</span>
                                            <small
                                                class="text-muted">{{ Auth::user()->email ?? "alimustaphashettima@gmail.com" }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="d-flex align-items-center align-middle">
                                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                        <span class="flex-grow-1 align-middle">Billing</span>
                                        <span
                                            class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <!-- Authentication -->
                                <form method="POST" class="dropdown-item" action="{{ route('logout') }}" x-data>
                                    @csrf
        
                                    <x-responsive-nav-link class="align-middle" href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!--/ User -->
                </ul>
            </div>
        </nav>

        <div class="container">
            <!-- Content -->
            <div class="content">
                <livewire:Map />
            </div>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        ALmax
                    </div>
                    <div>
                        <a href="https://github.com/ALmax-git" class="footer-link me-4" target="_blank">License</a>
                        <a href="https://github.com/ALmax-git" target="_blank" class="footer-link me-4">More Themes</a>

                        <a href="https://github.com/ALmax-git" target="_blank"
                            class="footer-link me-4">Documentation</a>

                        <a href="mailto:alimustaphashettima@gmail.com" target="_blank"
                            class="footer-link me-4">Support</a>
                    </div>
                </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        </div>
        <div class="buy-now">
            <a href="mailto:alimustaphashettima@gmail.com" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
        </div>

        <script src="build/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="build/assets/vendor/libs/popper/popper.js"></script>
        <script src="build/assets/vendor/js/bootstrap.js"></script>
        <script src="build/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="build/assets/vendor/js/menu.js"></script>

        <script src="build/assets/vendor/libs/apex-charts/apexcharts.js"></script>

        <script src="build/assets/js/main.js"></script>

        <script src="build/assets/js/dashboards-analytics.js"></script>
    </body>

</html>