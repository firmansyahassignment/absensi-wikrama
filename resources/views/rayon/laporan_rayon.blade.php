@extends('layouts.app')

@section('title', 'Laporan Rayon ' . $rayon->rayon)

@section('breadcrumb')

<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role . 'beranda') }}">Beranda</a></div>
    <div class="breadcrumb-item">Laporan Rayon {{ $rayon->rayon }}</div>
</div>

@endsection

@section('content')

<div class="card">
    <form action="" method="GET">
        <div class="card-header">
            <h4>Laporan</h4>
            <div class="card-header-action dropdown">
                <a href="{{ route($link_role . 'laporkan_kesalahan') }}" class="btn btn-md btn-primary"><i class="fas fa-exclamation-triangle"></i> Laporkan Kesalahan</a>
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
                <button class="btn btn-md btn-primary">Selesai</button>
            </div>
        </div>
    </form>
</div>

<!-- Jika yang dipilih hanya satu tanggal -->
@if (cek_range(request()->tanggal_pertama, request()->tanggal_terakhir) == "one")
    
<div class="card">
    <div class="card-header">
        <h4>Laporan {{ $request->range ?? \Carbon\Carbon::parse(request()->tanggal_pertama)->formatLocalized('%d %B %Y') }}</h4>
        <div class="card-header-action dropdown">
            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li class="dropdown-title">Usaha</li>
                <li><a href="{{ route($link_role . 'rayon.absen', $rayon->id) }}?tanggal={{ request()->tanggal_pertama ?? date('d-m-Y') }}" class="dropdown-item">Edit</a></li>

            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="text-center">
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Rayon</th>
                    <th>Keterangan</th>
                </thead>
                <tbody class="text-center">
                    @forelse ($rayon->siswas as $siswa)
                    <tr>
                        <td>{{ $siswa->nis }}</td>
                        <td class="text-left">{{ $siswa->nama }}</td>
                        <td>{{ $siswa->rayon->rayon }}</td>
                        <td>{{ $siswa->absens->where('tanggal_absen', ubah_format_tanggal(request()->tanggal_pertama) ?? date('Y-m-d'))->first()->keterangan ?? 'belum diabsen' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center"><h3 class="text-secondary">Tidak ada data</h3></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@else
    
<!-- Kalkulasi Harian Jika Pilih Range awal dan akhir -->

@if (kalkulasi_absensi_rayon($rayon, range_format_db(request()->tanggal_pertama, request()->tanggal_terakhir))->count() > 0)
<!-- Chart Range Absen -->
<div class="card">
    <div class="card-body">
        <canvas id="myChart" height="50"></canvas>
    </div>
</div>
@endif

<!-- Kalkulasi Per Siswa -->
<div class="card">
    <div class="card-header">
        <h4>Kalkukulasi Per Siswa</h4>
        @if ($rayon->siswa)    
        <div class="card-header-action dropdown">
            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li class="dropdown-title">Download</li>
                <li>
                    {{-- <a  class="dropdown-item" href="{{ route($link_role . 'laporan.rombel_siswa_pdf_download', $rayon) }}?tanggal_pertama={{ format_local(request()->tanggal_pertama) }}&tanggal_terakhir={{ format_local(request()->tanggal_terakhir) }}">PDF</a> --}}
                </li>
                <li>
                    {{-- <a  class="dropdown-item" href="{{ route($link_role . 'laporan.rombel_siswa_xl_download', $rayon) }}?tanggal_pertama={{ format_local(request()->tanggal_pertama) }}&tanggal_terakhir={{ format_local(request()->tanggal_terakhir) }}">Excel</a> --}}
                </li>

            </ul>
        </div>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="text-center">
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Rayon</th>
                    <th>Masuk</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alfa</th>
                    <th></th>
                </thead>
                <tbody class="text-center">
                    @forelse ($rayon->siswas as $siswa)
                    <tr>
                        <td>{{ $siswa->nis }}</td>
                        <td class="text-left">{{ $siswa->nama }}</td>
                        <td>{{ $siswa->rayon->short }}</td>
                        <td>{{ $siswa->absen_range(tanggal_range_db(), 'masuk')->count() }}</td>
                        <td>{{ $siswa->absen_range(tanggal_range_db(), 'sakit')->count() }}</td>
                        <td>{{ $siswa->absen_range(tanggal_range_db(), 'izin')->count() }}</td>
                        <td>{{ $siswa->absen_range(tanggal_range_db(), 'alfa')->count() }}</td>
                        <td><button class="btn btn-sm btn-success" data-toggle="modal" data-id="{{ $siswa->id }}" data-target="#rincian_absensi_siswa">rincian</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center"><h3 class="text-secondary">Tidak ada data</h3></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Kalkulasi Harian</h4>
        <div class="card-header-action dropdown">
            {{-- <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li><a href="#" class="dropdown-item">Laporkan Kesalahan</a></li>
            </ul> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="text-center">
                    <th>Tanggal</th>
                    <th>Masuk</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alfa</th>
                    <th></th>
                </thead>
                <tbody>
                    @forelse (kalkulasi_absensi_rayon($rayon, range_format_db(request()->tanggal_pertama, request()->tanggal_terakhir)) as $item)
                    <tr class="text-center">
                        <td>{{ tanggal_bulan($item->tanggal_absen) }}</td>
                        <td>{{ $absens->where('rayon_id', $rayon->id)->where('tanggal_absen', $item->tanggal_absen)->where('keterangan', 'masuk')->count() }}</td>
                        <td>{{ $absens->where('rayon_id', $rayon->id)->where('tanggal_absen', $item->tanggal_absen)->where('keterangan', 'sakit')->count() }}</td>
                        <td>{{ $absens->where('rayon_id', $rayon->id)->where('tanggal_absen', $item->tanggal_absen)->where('keterangan', 'izin')->count() }}</td>
                        <td>{{ $absens->where('rayon_id', $rayon->id)->where('tanggal_absen', $item->tanggal_absen)->where('keterangan', 'alfa')->count() }}</td>
                        <td>
                            <a href="{{ route($link_role . 'rayon.absen', $item->rayon_id) }}?tanggal={{ format_local($item->tanggal_absen) }}" class="btn btn-sm btn-primary">edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center"><h3 class="text-secondary">Tidak ada data</h3></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@endsection


@section('modal')
<div class="fade modal" id="rincian_absensi_siswa">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rincian Absen Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td class="pr-3">Nama</td>
                        <td>:</td>
                        <td class="pl-2" id="modal_nama">memuat ...</td>
                    </tr>
                    <tr>
                        <td class="pr-3">NIS</td>
                        <td>:</td>
                        <td class="pl-2" id="modal_nis">memuat ...</td>
                    </tr>
                    <tr>
                        <td class="pr-3">Rayon</td>
                        <td>:</td>
                        <td class="pl-2" id="modal_rayon">memuat ...</td>
                    </tr>
                </table>
                <br>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="text-center">
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody class="text-center" id="detail_laporan_absen">
                            <tr class="align-middle">
                                <td colspan="2"><h3 class="text-secondary text-center">Memuat ...</h3></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <button class="btn btn-sm btn-danger"><i class="fas fa-exclamation-triangle" aria-hidden="true"></i> laporkan kesalahan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')

<script>
    // JSON


    // Modal
    $('#rincian_absensi_siswa').on('show.bs.modal', function (e) {
        
        var id = $(e.relatedTarget).data('id');
        
        $.ajax({
            type: "GET",
            url: "{{ url('api/rincian-absensi-siswa') }}/" + id,
            data: {
                'tanggal_pertama' : "{{ request()->tanggal_pertama ?? date('d-m-Y') }}",
                'tanggal_terakhir' : "{{ request()->tanggal_terakhir ?? date('d-m-Y') }}"
            },
            dataType: "JSON",
            success: function (response) {
                $('#modal_nis').html(response.nis);
                $('#modal_nama').html(response.nama);
                $('#modal_rayon').html(response.rayon);

                $datalength = (response.absensi).length;

                $('#detail_laporan_absen').html('');
                if ($datalength > 0) {
                    for (let i = 0; i < (response.absensi).length; i++) {
                        const a = response.absensi[i];                    
                        var html = '<tr><td>' + moment(a.tanggal_absen, 'YYYY-MM-DD').format('DD/MM') +  '</td><td>' + a.keterangan + '</td></tr>';
                        $('#detail_laporan_absen').append(html);   
                    }
                } else{
                    $('#detail_laporan_absen').html('<tr class="align-middle"><td colspan="2"><h3 class="text-secondary text-center">Tidak ada data</h3></td></tr>');
                }

            }
        });

    });

</script>


<script>
// Daterange Picker
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


// Chart
var statistics_chart = document.getElementById("myChart").getContext('2d');

var myChart = new Chart(statistics_chart, {
    type: 'line',
    data: {
        labels: [{!! html_entity_decode(date_range_absen($rayon, [request()->tanggal_pertama, request()->tanggal_terakhir])) !!}],
        datasets: [{
            label: 'Masuk',
            data: [{{ value_range_absen($rayon, [request()->tanggal_pertama, request()->tanggal_terakhir]) }}],
            borderWidth: 5,
            borderColor: '#6777ef',
            backgroundColor: 'transparent',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#6777ef',
            pointRadius: 4,
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    stepSize: {{ stepSize($rayon) }}
                }
            }],
            xAxes: [{
                gridLines: {
                    color: '#fbfbfb',
                    lineWidth: 2
                }
            }]
        },
    }
});
</script>

@endsection