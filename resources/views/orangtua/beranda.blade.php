@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<!-- Card Pembukaan -->
<div class="row">

    <!-- Hari dan Tanggal -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
            <div class="card-stats" id="tanggal_stats">
                <div class="card-stats-title">Hari ini adalah</div>
                <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ \Carbon\Carbon::parse(date('Y-m-d'))->formatLocalized('%A') }}</div>
                        <div class="card-stats-item-label">Hari</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ \Carbon\Carbon::parse(date('Y-m-d'))->formatLocalized('%d') }}</div>
                        <div class="card-stats-item-label">Tanggal</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ \Carbon\Carbon::parse(date('Y-m-d'))->formatLocalized('%B') }}</div>
                        <div class="card-stats-item-label">Bulan</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ \Carbon\Carbon::parse(date('Y-m-d'))->formatLocalized('%Y') }}</div>
                        <div class="card-stats-item-label">Tahun</div>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-warning">
                <i class="fas fa-smile"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Selamat 
                        @php
                            if (date('H') < 11) {
                                echo "Pagi";
                            } else if(date('H') <= 14){
                                echo "Siang";
                            } else if(date('H') <= 16){
                                echo "Sore";
                            } else if(date('H') <= 18){
                                echo "Petang";
                            } else if((date('H') <= 3) || date('H') > 18){
                                echo "Malam";
                            }
                        @endphp
                    </h4>
                </div>
                <div class="card-body">
                    {{ Auth::user()->nama }}
                </div>
            </div>
        </div>
    </div>

    <!-- Kalkulasi Hari -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title text-center">Hari ini</div>
                <div class="card-stats-items">
                    <div class="card-stats-item w-100">
                        <div class="card-stats-item-count text-center"><h2>{{ $siswa->nama }}</h2></div>
                    </div>
                </div>
            </div>
            @switch($hari_ini->keterangan ?? null)
                @case('masuk')
                    <div class="card-icon shadow-primary bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    @break
                @case('sakit')
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-thermometer"></i>
                    </div>
                    @break
                @case('izin')
                    <div class="card-icon shadow-primary bg-light">
                        <i class="fas fa-paperclip"></i>
                    </div>
                    @break
                @case('alfa')
                    <div class="card-icon shadow-primary bg-danger">
                        <i class="fas fa-times"></i>
                    </div>
                    @break
                @default
                    <div class="card-icon shadow-primary bg-warning">
                        <i class="fas fa-low-vision    "></i>
                    </div>
                    @break
            @endswitch
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Keterangan</h4>
                </div>
                <div class="card-body">
                    {{ strtoupper($hari_ini->keterangan ?? 'Belum ada data') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Card Kalkulasi Bagian -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon shadow-primary bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Masuk</h4>
                </div>
                <div class="card-body">
                    {{ $masuk }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-thermometer"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Sakit</h4>
                </div>
                <div class="card-body">
                    {{ $sakit }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon shadow-primary bg-light">
                <i class="fas fa-paperclip"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Izin</h4>
                </div>
                <div class="card-body">
                    {{ $izin }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon shadow-primary bg-danger">
                <i class="fas fa-times"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Alfa</h4>
                </div>
                <div class="card-body">
                    {{ $alfa }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <p><small>*Jika keterangan siswa hari ini tidak sesuai silahkan untuk menghubungi pembimbing rayon.</small></p>
    </div>
</div>
@endsection