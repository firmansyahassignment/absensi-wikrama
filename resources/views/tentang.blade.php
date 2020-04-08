@extends('layouts.welcome_template')

@section('title', 'Tentang')

@section('content')

        <!-- Banner Tentang -->
        <div class="banner banner-tentang h-100vh d-flex align-items-center justify-content-center">
            <h1 class="banner-title">DEVELOPER TEAM</h1>
            <img src="{{ asset('assets/img/advice.svg')}}" alt="" class="banner-img">
        </div>

        <!-- Section Big White Quote -->
        <div class="section-big-white-quote d-flex align-items-center justify-content-center py-5">
            <div class="container big-white-quote-text">
                <h1 class="display-2">It is literally true that you can succeed best and quickest by helping others to succeed</h1>
            </div>
            <div class="big-white-quote-bg">
                <img src="{{ asset('assets/img/paint.jpg')}}" alt="" class="big-white-quote-bg-one wow fadeInRight">
                <img src="{{ asset('assets/img/vas.jpg')}}" alt="" class="big-white-quote-bg-two wow fadeInLeft">
            </div>
        </div>

        <!-- Section Team Card -->
        <div class="section-team-card py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 my-3">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="card-profile-img">
                                    <div class="card-profile-img-cover">
                                        <img src="{{ asset('assets/img/firman.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="card-profile-identity text-center mt-3">
                                    <h3 class="card-profile-name m-0">Muhamad Firmansyah</h3>
                                    <p class="text-muted"><small>Programmer</small></p>
                                    <hr width="30%">
                                    <p class="mt-2 card-profile-quote">"I believe every human has a finite number of heartbeats. I don't intend to waste any of mine." &mdash; <i>Neil Amstrong</i></p>
                                </div>
                                <div class="card-profile-socmed d-flex align-items-center justify-content-center mt-4">
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-instagram text-purple" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-facebook-square text-primary" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-whatsapp text-success" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="card-profile-img">
                                    <div class="card-profile-img-cover">
                                        <img src="{{ asset('assets/img/team.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="card-profile-identity text-center mt-3">
                                    <h3 class="card-profile-name m-0">Irmaliani</h3>
                                    <p class="text-muted"><small>Workflow Designer</small></p>
                                    <hr width="30%">
                                    <p class="mt-2 card-profile-quote">"Many of life's failures are people who did not realize how close they were to success when they gave up." &mdash; <i>Thomas A. Edison</i></p>
                                </div>
                                <div class="card-profile-socmed d-flex align-items-center justify-content-center mt-4">
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-instagram text-purple" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-facebook-square text-primary" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-whatsapp text-success" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="card-profile-img">
                                    <div class="card-profile-img-cover">
                                        <img src="{{ asset('assets/img/team.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="card-profile-identity text-center mt-3">
                                    <h3 class="card-profile-name m-0">Naila Faujiah F.</h3>
                                    <p class="text-muted"><small>Creative Engineer</small></p>
                                    <hr width="30%">
                                    <p class="mt-2 card-profile-quote">"The best and most beautiful things in the world cannot be seen or even touched; they must be felt with the heart." &mdash; <i>Hellen K.</i></p>
                                </div>
                                <div class="card-profile-socmed d-flex align-items-center justify-content-center mt-4">
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-instagram text-purple" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-facebook-square text-primary" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-profile-socmed-icon">
                                        <a href="#"><i class="fab fa-whatsapp text-success" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Statement -->
        <div class="section-statement py-5 bg-light">
            <div class="container">
                <h3 class="display-3 section-title">We Are Proudly Present <br><strong><i class="fas fa-fingerprint fa-sm fa-fw"></i>ABSENSI WIKRAMA</strong> for&#58;</h3>
                <div class="row mt-5">
                    <div class="col-md-6 my-3">
                        <div class="statement-group">
                            <div class="statement-img">
                                <img src="{{ asset('assets/img/wikrama.png')}}" alt="" class="">
                            </div>
                            <h3 class="statement-img-description">SMK WIKRAMA KOTA BOGOR</h3>
                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <div class="statement-group">
                            <div class="statement-img">
                                <img src="{{ asset('assets/img/rpl.png')}}" alt="" class="">
                            </div>
                            <h3 class="statement-img-description">REKAYASA PERANGKAT LUNAK</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection