@extends('layouts.app')

@section('title', 'Laporan ' . $siswa->nama)

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'laporan.daftar_siswa') }}">Daftar Siswa</a></div>
    <div class="breadcrumb-item">{{ $siswa->nama }}</div>
</div>
@endsection

@section('content')

<div class="card">
    <form action="" method="GET">
        <div class="card-header">
            <h4>Laporan</h4>
            <div class="card-header-action dropdown">
                
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Pilih jangka tanggal</label>
                <div class="input-group w-auto">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control daterange-cus" value="{{ request()->tanggal_pertama ? (request()->tanggal_pertama . ' - ' . request()->tanggal_terakhir) : date('d-m-Y - d-m-Y') }}">
                    <input type="hidden" name="tanggal_pertama" id="tanggal_pertama" value="{{ request()->tanggal_pertama ?? date('d-m-Y') }}">
                    <input type="hidden" name="tanggal_terakhir" id="tanggal_terakhir" value="{{ request()->tanggal_terakhir ?? date('d-m-Y') }}">
                </div>
            </div>
            <div class="text-left">
                <button class="btn btn-md btn-primary btn-loading">Selesai</button>
            </div>
        </div>
    </form>
</div>


<div class="row">
    <div class="col-md-5">

        <!-- Identitas -->
        <div class="card">
            <div class="card-header">
                <h4>Detail Siswa</h4>
                <div class="card-header-action dropdown">
                    
                </div>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td class="pr-2">Nama</td>
                        <td>:</td>
                        <td class="pl-1">{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">NIS</td>
                        <td>:</td>
                        <td class="pl-1">{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Rombel</td>
                        <td>:</td>
                        <td class="pl-1">{{ $siswa->rombel->rombel }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Rayon</td>
                        <td>:</td>
                        <td class="pl-1">{{ $siswa->rayon->rayon }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Orang Tua</td>
                        <td>:</td>
                        <td class="pl-1">{{ $siswa->orangtua->nama ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Chart Range Absen hanya ditampilkan jika ada rangenya -->

        @if (cek_range(request()->tanggal_pertama, request()->tanggal_terakhir) == "two")
        <div class="card">
            <div class="card-header">
                <h4>Statistik</h4>
                <div class="card-header-action dropdown">
                    
                </div>
            </div>
            <div class="card-body text-center">
                <div class="sparkline-pie"></div>
            </div>
            <div class="card-footer">
                <table>
                    <tr>
                        <td class="pr-2">Masuk</td>
                        <td>:</td>
                        <td class="pl-1">{{ ls_jumlah_keterangan($siswa)[0] }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Sakit</td>
                        <td>:</td>
                        <td class="pl-1">{{ ls_jumlah_keterangan($siswa)[1] }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Izin</td>
                        <td>:</td>
                        <td class="pl-1">{{ ls_jumlah_keterangan($siswa)[2] }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Alfa</td>
                        <td>:</td>
                        <td class="pl-1">{{ ls_jumlah_keterangan($siswa)[3] }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endif

    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4>Rincian</h4>
                @if (ls_range($siswa)->count() > 0)
                <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <li class="dropdown-title">Download</li>
                        <li><a target="_blank" href="{{  route($link_role.'laporan.siswa_pdf_download', $siswa) }}?{{ range_params() }}" class="dropdown-item">PDF</a></li>
                        <li><a target="_blank" href="{{ route($link_role.'laporan.siswa_xl_download', $siswa) }}?{{ range_params() }}" class="dropdown-item">Excel</a></li>
                        
                    </ul>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-md table-bordered table-hover">
                        <thead class="text-center">
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Diabsen oleh</th>
                        </thead>
                        <tbody class="text-center">
                            @forelse (ls_range($siswa) as $absen)
                            <tr>
                                <td>{{ tanggal_bulan($absen->tanggal_absen) }}</td>
                                <td>{{ $absen->keterangan ?? 'belum diabsen' }}</td>
                                <td>{{ $absen->user->nama ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center"><h3 class="text-secondary">Tidak ada data</h3></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('modal')

@endsection



@section('script')

<script>
    $('.daterange-cus').daterangepicker({
        locale: { format: 'DD-MM-YYYY' },
        ranges: {
            'Hari ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
            '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
            'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
    }, function(start, end) {
        $('#tanggal_pertama').val(start.format('DD-MM-YYYY'));
        $('#tanggal_terakhir').val(end.format('DD-MM-YYYY'));
    });
</script>


<script>
        var sparkline_pie = [{!! html_entity_decode(ls_chart_val($siswa)) !!}];

        $(".sparkline-pie").sparkline(sparkline_pie, {
            type: 'pie',
            width: 'auto',
            height: '200',
            barWidth: 20
        });
</script>

@endsection