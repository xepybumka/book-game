<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/favicon.png') }}">
    <title>
        Admin panel
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>
    <!-- Nucleo Icons -->
    <link href="{{ URL::asset('assets/css/nucleo-icons.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/css/nucleo-svg.css') }}" rel="stylesheet"/>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ URL::asset('assets/css/material-dashboard.css') }}" rel="stylesheet"/>
    <link id="pagestyle" href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet"/>
</head>

<body class="g-sidenav-show  bg-gray-200">
<!-- Sidebar -->
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin') }}"
           target="_blank">
            <img src="{{ URL::asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Admin panel</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('paragraph.list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Параграфы</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('weapon.list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Оружие</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('item.list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Предметы</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('enemy.list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Противники</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('note.list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Заметки</span>
                </a>
            </li>
        </ul>
        <hr class="horizontal light mt-0 mb-2">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white " href="#!">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- End Sidebar -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
         navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me -5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="{{ route('admin') }}">
                                Admin
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            @yield('breadcrumbs')
                        </li>
                    </ol>
                </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row min-vh-80 h-100">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
</main>
<!--   Core JS Files   -->
<script src="{{ URL::asset('assets/js/core /popper.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ URL::asset('assets/js/material-dashboard.min.js') }}"></script>
</body>
</html>
