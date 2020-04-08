<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABSENSI WIKRAMA &mdash; @yield('title')</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('assets/img/fingerprint.svg') }}" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fontawesome/all.css')}}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/vendor/dataTable/dataTables.bootstrap4.min.css')}}">
    <!-- Swiper -->
    <link rel="stylesheet" href="{{asset('assets/vendor/swiper/swiper.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Calling for Vendor -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor.css')}}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-fingerprint fa-lg fa-fw"></i>ABSENSI WIKRAMA</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('login'))
                            @auth
                                @switch(Auth::user()->role)
                                    @case('1')
                                        <a class="nav-link" href="{{ url('/piket-kurikulum') }}">Masuk</a>
                                        @break
                                    @case('2')
                                        <a class="nav-link" href="{{ url('/guru') }}">Masuk</a>
                                        @break
                                    @case('3')
                                        <a class="nav-link" href="{{ url('/pembimbing-rayon') }}">Masuk</a>
                                        @break
                                    @default

                                @endswitch
                            @else
                                <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Masuk</a>
                            @endauth
                        @endif
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                        <div class="dropdown-menu border-0 shadow-sm" aria-labelledby="dropdownId">
                            <a href="#" onclick="showPencarian()" class="dropdown-item">Pencarian</a>
                            <a href="{{ url('tentang') }}" class="dropdown-item">Tentang</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="wrapper">

        <!-- Pencarian -->
        <div class="section-pencarian">
            <div class="pencarian-btn-close">
                <a href="" onclick="closePencarian()" class="icon-close"></a>
            </div>
            <form class="pencarian-content" method="GET">
                <input type="text" class="pencarian-inputbox" placeholder="Cari sesuatu..." name="q">
            </form>
        </div>

        @yield('content')

        <!-- Section Footer -->
        <footer class="section-footer py-2 bg-white text-dark text-right">
            <div class="container-fluid text-center">
                Copyright 2020 by <b><i class="fas fa-fingerprint fa-sm fa-fw"></i>ABSENSI WIKRAMA</b> <a href="{{ route('tentang') }}" class="text-dark">developer team.</a>
            </div>
        </footer>
    </div>

</body>
<!-- JQuery -->
<script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/vendor/dataTable/dataTables.bootstrap4.min.js')}}"></script>
<!-- Swiper -->
<script src="{{ asset('assets/vendor/swiper/swiper.min.js')}}"></script>
<!-- Font Awesome -->
<script src="{{ asset('assets/vendor/fontawesome/all.js')}}"></script>
<!-- WowJS -->
<script src="{{ asset('assets/vendor/wowjs/wow.min.js')}}"></script>
<!-- Calling For Pluggin -->
<script src="{{ asset('assets/js/vendor.js')}}"></script>
<!-- Custom -->
<script src="{{ asset('assets/js/custom.js')}}"></script>
</html>