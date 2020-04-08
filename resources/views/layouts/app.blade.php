<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ABSENSI WIKRAMA &mdash; @yield('title')</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('assets/img/fingerprint.svg')}}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/modules/izitoast/css/iziToast.min.css')}}">


    <!-- Template CSS -->
    <style>body{ overflow: hidden; } .lds-ring {display: inline-block;position: relative;width: 80px;height: 80px;}.lds-ring div {box-sizing: border-box;display: block;position: absolute;width: 64px;height: 64px;margin: 8px;border: 8px solid #cdd3d8;border-radius: 50%;animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;border-color: #cdd3d8 transparent transparent transparent;}.lds-ring div:nth-child(1) {animation-delay: -0.45s;}.lds-ring div:nth-child(2) {animation-delay: -0.3s;}.lds-ring div:nth-child(3) {animation-delay: -0.15s;}@keyframes lds-ring {0% {transform: rotate(0deg);}100% {transform: rotate(360deg);}}</style>
    <link rel="stylesheet" href="{{ asset('assets/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/components.css')}}">
</head>

<body>
    <div id="app">
        <div id="loader" style="position: fixed; z-index: 1000; background: white; width: 100vw; height: 100vh; display: flex; justify-content:center; align-items: center;"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">

                <!-- Search Form -->
                <form class="form-inline mr-auto">
                    @if (if_role(['1', '2'], 'OR'))
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>

                    <!-- Search elemet -->
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Cari" aria-label="Search" data-width="250" id="search_global_keyword" onkeyup="cari_global()">
                        <a href="#" class="btn"><i class="fas fa-search"></i></a>
                        <div class="search-backdrop"></div>
                        <div class="search-result" id="search_result">
                            <!-- Search Siswa -->
                            <h3 class="text-secondary text-center mt-3 py-4">Cari siswa, rombel ...</h3>
                            <div id="search_siswa">
                                
                            </div>

                            <!-- Search Rombel -->
                            <div id="search_rombel">
                                
                            </div>
                            
                        </div>
                    </div>
                    @endif
                </form>

                <ul class="navbar-nav navbar-right">

                    {{-- @if (if_role(['1', '3'], 'OR'))
                        <!-- Siswa Dilaporkan -->
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header">Siswa Dilaporkan
                                    <div class="float-right">
                                        <a href="#">Tandai baca semua</a>
                                    </div>
                                </div>
                                <div class="dropdown-list-content dropdown-list-message">
                                    <a href="detail_pesan.html" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-avatar">
                                            <img alt="image" src="{{ asset('assets/dist/img/avatar/avatar-2.png')}}" class="rounded-circle">
                                            <div class="is-online"></div>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <b>Rahmadi Sutejo</b>
                                            <p>Oh, tadi saya lupa absen. Siska izin.</p>
                                            <div class="time">1 JAM YANG LALU</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="pesan.html">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                    @endif --}}

                    @if (if_role(['1', '2', '3', '4'], 'OR'))
                    <!-- Pengumuman -->
                    <li class="dropdown dropdown-list-toggle" id="pengumuman"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg" id="bell_pengumuman"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Pengumuman
                                <div class="float-right">
                                    {{-- <a href="#">Tandai baca semua</a> --}}
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons" id="pengumuman_unreaded_item">
                                <div class="d-flex h-100 align-items-center justify-content-center"><h3 class="text-secondary">Memuat ...</h3></div>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="{{ route($link_role.'pengumuman') }}">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    @endif

                    <!-- Akun Info -->
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/dist/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->nama }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
                            <a href="{{ route($link_role.'pengaturan_akun') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Akun
                            </a>
                            {{-- <a href="pesan.html" class="dropdown-item has-icon">
                                <i class="far fa-envelope"></i> Siswa Dilaporkan
                            </a> --}}
                            <a href="{{ route($link_role.'pengumuman') }}" class="dropdown-item has-icon">
                                <i class="far fa-bell"></i> Pengumuman
                            </a>
                            <a href="{{ route($link_role.'laporkan_kesalahan') }}" class="dropdown-item has-icon">
                                <i class="fas fa-exclamation-triangle"></i> Laporkan kesalahan
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Sidebar -->
            <div class="main-sidebar sidebar-style-2">

                {{-- If User == Guru --}}
                <aside id="sidebar-wrapper">

                        
                    <!-- Title -->
                    <div class="sidebar-brand">
                        <a href="{{ route($link_role.'beranda') }}">
                            <span class="title-global"><i class="fas fa-fingerprint fa-sm fa-fw"></i>ABSENSI WIKRAMA</span>
                        </a>
                    </div>

                    <!-- Title Responsive -->
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route($link_role.'beranda') }}"><i class="fas fa-fingerprint"></i></a>
                    </div>

                    <!-- Menu Menu -->
                    <ul class="sidebar-menu">

                        <!-- Beranda -->
                        <li class="{{ request()->routeIs($link_role.'beranda') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'beranda') }}"><i class="fas fa-home"></i> <span>Beranda</span></a></li>

                        @if (if_role(['1', '2'], 'OR'))
                        <!-- Absen -->
                        <li class="{{ request()->routeIs($link_role.'absen.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'absen.daftar_rombel') }}"><i class="fas fa-check-square"></i> <span>Absen</span></a></li>
                        
                        <!-- Laporan -->
                        <li class="dropdown {{ request()->routeIs($link_role.'laporan.*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Laporan</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->routeIs($link_role.'laporan.daftar_rombel') ? 'active' : '' }}{{ request()->routeIs($link_role.'laporan.rombel') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'laporan.daftar_rombel') }}">Rombel</a></li>
                                <li class="{{ request()->routeIs($link_role.'laporan.daftar_siswa') ? 'active' : '' }}{{ request()->routeIs($link_role.'laporan.siswa') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'laporan.daftar_siswa') }}">Siswa</a></li>
                            </ul>
                        </li>
                        @endif
                        
                        
                        @if (if_role(['3'], 'AND'))
                        <!-- Rayon -->
                        <li class="dropdown {{ request()->routeIs($link_role.'data.*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-calculator"></i> <span>Rayon</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($rayons as $rayon) 
                                <li class=""><a class="nav-link" href="">{{ $rayon->rayon }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                        </li>

                        @if (if_role(['1'], 'AND'))
                        <!-- Data -->
                        <li class="dropdown {{ request()->routeIs($link_role.'data.*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-folder"></i> <span>Data</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->routeIs($link_role.'data.rombel') ? 'active' : '' }}{{ request()->routeIs($link_role.'data.rombel.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'data.rombel') }}">Rombel</a></li>
                                <li class="{{ request()->routeIs($link_role.'data.siswa.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'data.siswa.daftar_siswa') }}">Siswa</a></li>
                                <li class="{{ request()->routeIs($link_role.'data.pengguna.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'data.pengguna.daftar_pengguna') }}">Pengguna</a></li>
                                <li class="{{ request()->routeIs($link_role.'data.rayon.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'data.rayon.daftar_rayon') }}">Rayon</a></li>
                                <li class="{{ request()->routeIs($link_role.'data.jurusan.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'data.jurusan.daftar_jurusan') }}">Jurusan</a></li>
                            </ul>
                        @endif
                        </li>

                        <!-- Fitur lain -->
                        <li class="menu-header">Fitur Lain</li>

                        @if (if_role(['1', '3'], 'OR'))
                        <!-- Laporkan Siswa -->
                        <li class="{{ request()->routeIs($link_role.'siswa_dilaporkan.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route($link_role.'siswa_dilaporkan.daftar_siswa_dilaporkan') }}">
                                <i class="fas fa-exclamation-circle"></i> <span>Siswa Dilaporkan</span>
                            </a>
                        </li>
                        @endif
                        
                        <!-- Pengumuman -->
                        <li class="{{ request()->routeIs($link_role.'pengumuman') ? 'active' : '' }}{{ request()->routeIs($link_role.'pengumuman.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route($link_role.'pengumuman') }}">
                                <i class="fas fa-bell"></i> <span>Pengumuman</span>
                            </a>
                        </li>

                        <!-- Pengaturan -->
                        <li class="menu-header">Pengaturan</li>

                        <!-- Akun -->
                        <li class="{{ request()->routeIs($link_role.'pengaturan_akun') ? 'active' : '' }}{{ request()->routeIs($link_role.'ubah_autentikasi') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'pengaturan_akun') }}"><i class="far fa-user"></i> <span>Akun</span></a></li>

                        <!-- Laporkan Kesalahan -->
                        <li class="{{ request()->routeIs($link_role.'laporkan_kesalahan') ? 'active' : '' }}"><a class="nav-link" href="{{ route($link_role.'laporkan_kesalahan') }}"><i class="fas fa-exclamation-triangle"></i> <span>Laporkan Kesalahan</span></a></li>

                        <!-- Keluar -->
                        <li>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <!-- Title -->
                    <div class="section-header">
                        <h1>@yield('title')</h1>
                        @yield('breadcrumb')
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                    @endif
                    
                    @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @yield('content')


                </section>
            </div>
            <footer class="main-footer">
              <div class="footer-left">
                  Copyright &copy; 2020
                  <span class="title-global text-dark"><i class="fas fa-fingerprint fa-sm fa-fw"></i>ABSENSI WIKRAMA</span><a href="{{ route('tentang') }}" target="_blank" class=""> developer team.</a>
              </div>
              <div class="footer-right">
                  v1.0.0
              </div>
            </footer>
        </div>
    </div>

    @yield('modal')

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/dist/modules/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/popper.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/tooltip.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/moment.min.js')}}"></script>
    <script src="{{ asset('assets/dist/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/dist/modules/cleave-js/dist/cleave.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/chart.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/jquery.sparkline.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/dist/js/page/forms-advanced-forms.js')}}"></script>
    <script src="{{ asset('assets/dist/modules/izitoast/js/iziToast.min.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{asset('assets/dist/modules/prism/prism.js')}}"></script>
    <script src="{{asset('assets/dist/js/page/bootstrap-modal.js')}}"></script>
    <script src="{{ asset('assets/dist/js/scripts.js')}}"></script>
    <script src="{{ asset('assets/dist/js/custom.js')}}"></script>

    {{-- Custom --}}

    @if (if_role(['1', '2', '3', '4'], 'OR'))
        
    <script>
        get_beep();

        setInterval(() => {
            get_beep();
        }, 5000);

        function get_beep() {
            $.ajax({
                type: "GET",
                url: "{{ route('api.pengumuman_beep') }}",
                data: "",
                dataType: "JSON",
                success: function (response) {
                    if (response.beep) {
                        $('#bell_pengumuman').addClass('beep');
                    } else{
                        $('#bell_pengumuman').removeClass('beep');
                    }
                }
            });
        }

        $('#pengumuman').on('show.bs.dropdown', function () {
            get_beep();
            $.ajax({
                type: "GET",
                url: "{{ route('api.pengumuman_unreaded') }}",
                data: "",
                dataType: "JSON",
                success: function (response) {
                    $el = $('#pengumuman_unreaded_item');
                    if (response.length > 0) {
                        $el.html('');
                        response.forEach(a => {
                            $el.append('<a href="' + a.route + '" class="dropdown-item"><div class="dropdown-item-icon bg-success text-white"><i class="fa fa-bell" aria-hidden="true"></i></div><div class="dropdown-item-desc"><b>' + a.subject + '</b><div class="time">' + a.created_at + '</div></div></a>');
                        });
                    } else{
                        $el.html('<div class="d-flex h-100 align-items-center justify-content-center"><h3 class="text-secondary">Tidak ada pengumuman</h3></div>');
                    }
                },
                fail: function(){
                    $('#pengumuman_unreaded_item').html('<div class="d-flex h-100 align-items-center justify-content-center"><h3 class="text-secondary">Koneksi Gagal</h3></div>');
                }
            });
        });

    </script>
    @endif

    @if (if_role(['1', '2'], 'OR'))
    <script>

        function cari_global() {
            var keyword = $('#search_global_keyword').val();
            
            $('#search_result h3').text('Loading ...');
            // Search Siswa
            $.ajax({
                type: "GET",
                url: "{{ route('api.cari_siswa') }}",
                data: {
                    "q" : keyword
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.length > 0) {
                        $el = $('#search_siswa');
                        var link_laporan = "{{ route($link_role.'laporan.daftar_siswa') }}";
                        $el.html('<div class="search-header">Siswa</div>');
                        for (let index = 0; index < response.length; index++) {
                            const siswa = response[index];
                            
                            if (index < 3) {
                                $el.append('<div class="search-item"><a href="' + siswa.link + '"><div><span class="font-weight-bold">' + siswa.nama + '</span><br><small>' + siswa.nis + '</small></div></a></div>');
                            }
                        }

                        $('#search_result h3').remove();
                    }
                }
            });

            $.ajax({
                type: "GET",
                url: "{{ route('api.cari_rombel') }}",
                data: {
                    "q" : keyword
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.length > 0) {
                        $el = $('#search_rombel');
                        var link_laporan = "{{ route($link_role.'laporan.daftar_rombel') }}";
                        $el.html('<div class="search-header">Rombel</div>');
                        for (let index = 0; index < response.length; index++) {
                            const rombel = response[index];
                            
                            if (index < 3) {
                                $el.append('<div class="search-item"><a href="' + link_laporan + '/' + rombel.id + '"><div class="search-icon bg-danger text-white mr-3">' + rombel.jurusan.short + '</div>' + rombel.rombel + '</a></div>');
                            }
                        }
                    }
                }
            });
        }

    </script>
    @endif

    <script>
        $(document).on('click', '.btn-loading', function(){
            $(this).text('Loading ...');
            setTimeout(() => {
                $(this).attr('disabled', true);
            }, 50);
            setTimeout(() => {
                $(this).text('Selesai');
                $(this).attr('disabled', false);
            }, 500);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#loader').hide();
            $('body').css('overflow', 'auto');
        });
    </script>

    @yield('script')

</body>

</html>