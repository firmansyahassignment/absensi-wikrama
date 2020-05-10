@extends('layouts.app')

@section('title', 'Daftar Rombel')

@section('content')
<div id="accordion">

    @foreach ($rombels->unique('angkatan') as $angkatan)
        <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-{{ $angkatan->angkatan }}" aria-expanded="false">
                <h4>Kelas {{ $angkatan->angkatan }}</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-{{ $angkatan->angkatan }}" data-parent="#accordion">
                <div class="row">
                    @foreach ($rombels->where('angkatan', $angkatan->angkatan) as $rombel)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <a href="{{ route($link_role.   'laporan.rombel', $rombel->id) }}">
                                <div class="card card-statistic-1">
                                    @switch($rombel->jurusan->short)
                                        @case("RPL")
                                            <div class="card-icon bg-primary">
                                                <i class="fas fa-laptop"></i>
                                            </div>
                                            @break
                                        @case("OTKP")
                                            <div class="card-icon bg-pink">
                                                <i class="fas fa-keyboard"></i>
                                            </div>
                                            @break
                                        @case("TKJ")
                                            <div class="card-icon bg-danger">
                                                <i class="fas fa-network-wired"></i>
                                            </div>
                                            @break
                                        @case("BDP")
                                            <div class="card-icon bg-warning">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                            @break
                                        @case("MMD")
                                            <div class="card-icon bg-dark">
                                                <i class="fas fa-camera" aria-hidden="true"></i>
                                            </div>
                                            @break
                                        @case("HTL")
                                            <div class="card-icon bg-light">
                                                <i class="fas fa-hotel" aria-hidden="true"></i>
                                            </div>
                                            @break
                                        @case("TBG")
                                            <div class="card-icon bg-white">
                                                <i class="fas fa-utensil-spoon text-light"></i>
                                            </div>
                                            @break
                                        @default
                                            @break
                                    @endswitch
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>{{ $rombel->jurusan->short }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <i class="fa fa-circle fa-sm text-{{ ada_siswa($rombel) ? 'success' : 'danger' }}"></i> {{ $rombel->kelas }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection