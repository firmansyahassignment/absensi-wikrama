@extends('layouts.welcome_template')

@section('title', 'Beranda')

@section('content')
        <!-- Banner Beranda-->
        <div class="banner banner-beranda h-100vh d-flex align-items-center justify-content-center">
            <h1 class="banner-title">ABSENSI WIKRAMA</h1>
            <img src="{{ asset('assets/img/fingerprint-white.svg')}}" alt="" class="banner-img">
        </div>

        <!-- Section About -->
        <div class="section-about py-5">
            <div class="container">
                <h3 class="display-3 section-title">Mengapa Menggunakan <br><strong><i class="fas fa-fingerprint fa-sm fa-fw"></i>ABSENSI WIKRAMA</strong>?</h3>
                <hr width="50%" align="left">
                <article>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius eveniet sit eaque, quae voluptate iusto mollitia quos blanditiis deleniti repellendus labore provident earum quasi iste quaerat aperiam necessitatibus officia! Iure.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus quasi laboriosam adipisci neque maiores iste repellat autem, maxime voluptates voluptatibus molestiae aliquam perspiciatis voluptatum cum veniam libero delectus culpa, cumque eveniet amet eligendi ea fugit provident natus! Commodi, voluptatibus qui.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga vitae veniam dignissimos dolores, nemo vel expedita accusantium reprehenderit! Placeat repudiandae expedita illo quasi assumenda asperiores, veniam saepe aperiam accusantium minus sunt illum id sint eveniet nulla.</p>
                </article>
            </div>
        </div>

        <!-- Section Block Quote -->
        <div class="section-block-quote py-5 d-flex align-items-center justify-content-center bg-primary">
            <div class="container">
                <blockquote class="blockquote text-white">
                    <p class="mb-0 display-4 wow fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer text-white mt-4">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
            </div>
        </div>

        <!-- Section Fiturs -->
        <div class="section-fiturs py-5">
            <div class="container">
                <h3 class="display-3 section-title">Fitur Yang Tersedia Di <br><strong><i class="fas fa-fingerprint fa-sm fa-fw"></i>ABSENSI WIKRAMA</strong>&#58;</h3>
                <hr align="left" width="50%">
                <div class="row mt-5">
                    <div class="col-md-4 my-3">
                        <div class="card wow fadeInUp py-3 border-0 bg-white shadow" data-wow-delay="0.1s">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fa fa-check-circle text-success fa-lg fa-4x fa-fw" aria-hidden="true"></i>
                                </div>
                                <h3 class="card-title">Lorem Ipsum Dolore</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit nemo aut ducimus qui iste repellendus cupiditate, labore eligendi quia accusamus!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card wow fadeInUp py-3 border-0 bg-white shadow-sm" data-wow-delay="0.2s">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-download  text-dark fa-lg fa-4x fa-fw "></i>
                                </div>
                                <h3 class="card-title">Lorem Ipsum Dolore</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit nemo aut ducimus qui iste repellendus cupiditate, labore eligendi quia accusamus!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card wow fadeInUp py-3 border-0 bg-white shadow-sm" data-wow-delay="0.2s">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-folder-open  text-dark fa-lg fa-4x fa-fw   "></i>
                                </div>
                                <h3 class="card-title">Lorem Ipsum Dolore</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit nemo aut ducimus qui iste repellendus cupiditate, labore eligendi quia accusamus!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card wow fadeInUp py-3 border-0 bg-white shadow-sm" data-wow-delay="0.2s">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-tv  text-dark fa-lg fa-4x fa-fw   "></i>
                                </div>
                                <h3 class="card-title">Lorem Ipsum Dolore</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit nemo aut ducimus qui iste repellendus cupiditate, labore eligendi quia accusamus!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card wow fadeInUp py-3 border-0 bg-white shadow-sm" data-wow-delay="0.3s">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-users  text-dark fa-lg fa-4x fa-fw   "></i>
                                </div>
                                <h3 class="card-title">Lorem Ipsum Dolore</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit nemo aut ducimus qui iste repellendus cupiditate, labore eligendi quia accusamus!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card wow fadeInUp py-3 border-0 bg-white shadow-sm" data-wow-delay="0.4s">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-exclamation-triangle  text-dark fa-lg fa-4x fa-fw   "></i>
                                </div>
                                <h3 class="card-title">Lorem Ipsum Dolore</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit nemo aut ducimus qui iste repellendus cupiditate, labore eligendi quia accusamus!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Testimony -->
        <div class="section-testimony py-5 bg-light">
            <div class="container">
                <h3 class="display-3 section-title wow fadeInLeft">Apa Yang Mereka Katakan Tentang <br><strong><i class="fas fa-fingerprint fa-sm fa-fw"></i>ABSENSI WIKRAMA</strong>?</h3>
                <hr align="left" width="50%">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card border-0 shadow-sm rounded-lg">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="my-0">John Lennon</h3>
                                        <small class="text-muted">Students</small>
                                    </div>
                                    <hr align="left" width="50%">
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates corporis non recusandae quam in. Quam, reprehenderit sit quas cumque sapiente velit dolore blanditiis aliquam itaque eveniet rerum repudiandae deleniti.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow-sm rounded-lg">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="my-0">John Lennon</h3>
                                        <small class="text-muted">Students</small>
                                    </div>
                                    <hr align="left" width="50%">
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates corporis non recusandae quam in. Quam, reprehenderit sit quas cumque sapiente velit dolore blanditiis aliquam itaque eveniet rerum repudiandae deleniti.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow-sm rounded-lg">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="my-0">John Lennon</h3>
                                        <small class="text-muted">Students</small>
                                    </div>
                                    <hr align="left" width="50%">
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates corporis non recusandae quam in. Quam, reprehenderit sit quas cumque sapiente velit dolore blanditiis aliquam itaque eveniet rerum repudiandae deleniti.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow-sm rounded-lg">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="my-0">John Lennon</h3>
                                        <small class="text-muted">Students</small>
                                    </div>
                                    <hr align="left" width="50%">
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates corporis non recusandae quam in. Quam, reprehenderit sit quas cumque sapiente velit dolore blanditiis aliquam itaque eveniet rerum repudiandae deleniti.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow-sm rounded-lg">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="my-0">John Lennon</h3>
                                        <small class="text-muted">Students</small>
                                    </div>
                                    <hr align="left" width="50%">
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates corporis non recusandae quam in. Quam, reprehenderit sit quas cumque sapiente velit dolore blanditiis aliquam itaque eveniet rerum repudiandae deleniti.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow-sm rounded-lg">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="my-0">John Lennon</h3>
                                        <small class="text-muted">Students</small>
                                    </div>
                                    <hr align="left" width="50%">
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates corporis non recusandae quam in. Quam, reprehenderit sit quas cumque sapiente velit dolore blanditiis aliquam itaque eveniet rerum repudiandae deleniti.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        <!-- Section play -->
        <div class="section-play py-5">
            <div class="background-absolute wow fadeInUp">
                <div class="layout-relative">
                    <i class="fas fa-fingerprint fa-10x"></i>
                </div>
                <div class="layout-relative">
                    <i class="fas fa-fingerprint text-white fa-5x"></i>
                </div>
                <div class="layout-relative">
                    <i class="fas fa-fingerprint fa-2x"></i>
                </div>
                <div class="layout-relative">
                    <i class="fas fa-fingerprint fa-3x"></i>
                </div>
            </div>
            <div class="container text-center py-5 text-white">
                <h3 class="display-3 section-title wow fadeInUp">Mari mulai mengabsen!</h3>
                @if (Route::has('login'))
                    @auth
                        @switch(Auth::user()->role)
                            @case('1')
                                <a href="{{ url('piket-kurikulum') }}" class="wow bounceInUp btn btn-lg btn-light mt-4 btn-rounded"><i class="fa fa-play" aria-hidden="true"></i> Mulai</a>
                                @break
                            @case('2')
                                <a href="{{ url('guru') }}" class="wow bounceInUp btn btn-lg btn-light mt-4 btn-rounded"><i class="fa fa-play" aria-hidden="true"></i> Mulai</a>
                                @break
                            @case('3')
                                <a href="{{ url('pembimbing-rayon') }}" class="wow bounceInUp btn btn-lg btn-light mt-4 btn-rounded"><i class="fa fa-play" aria-hidden="true"></i> Mulai</a>
                                @break
                            @case('4')
                                <a href="{{ url('orangtua') }}" class="wow bounceInUp btn btn-lg btn-light mt-4 btn-rounded"><i class="fa fa-play" aria-hidden="true"></i> Mulai</a>
                                @break
                            @default
                        @endswitch
                    @else
                        <a href="{{ route('login') }}" class="wow bounceInUp btn btn-lg btn-light mt-4 btn-rounded"><i class="fa fa-play" aria-hidden="true"></i> Mulai</a>
                    @endauth
                @endif
            </div>
        </div>
@endsection