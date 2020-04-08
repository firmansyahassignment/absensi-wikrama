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
                <div class="card-stats-title">Kalkulasi Hari Ini</div>
                <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ jumlah_absen_hari_ini('masuk') }}</div>
                        <div class="card-stats-item-label">Masuk</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ jumlah_absen_hari_ini('sakit') }}</div>
                        <div class="card-stats-item-label">Sakit</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ jumlah_absen_hari_ini('izin') }}</div>
                        <div class="card-stats-item-label">Izin</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ jumlah_absen_hari_ini('alfa') }}</div>
                        <div class="card-stats-item-label">Alpa</div>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-dark">
                <i class="fas fa-times"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Belum Diabsen</h4>
                </div>
                <div class="card-body">
                    {{ jumlah_belum_diabsen_hari_ini() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Card Kalkulasi Bagian -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Siswa</h4>
                </div>
                <div class="card-body">
                    {{ jumlah_siswa() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-secondary">
                <i class="fa fa-rocket"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Jurusan</h4>
                </div>
                <div class="card-body">
                    {{ jumlah_jurusan() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Rombel</h4>
                </div>
                <div class="card-body">
                    {{ jumlah_rombel() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Rayon</h4>
                </div>
                <div class="card-body">
                    {{ jumlah_rayon() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection