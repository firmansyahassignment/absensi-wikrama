@extends('layouts.app')

@section('title', 'Absen Rombel ' . $rombel->rombel)

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'absen.daftar_rombel') }}">Daftar Rombel</a></div>
    <div class="breadcrumb-item">{{ $rombel->rombel }}</div>
</div>
@endsection

@section('content')

@php
    request()->tanggal = request()->tanggal ?? date('d-m-Y');
@endphp

<form action="" method="GET">
    <div class="card">
        <div class="card-header">
            <h4>Absen {{ request()->tanggal != '' ? 'Tanggal ' . format_manusia(request()->tanggal) : '' }}</h4>
            <div class="card-header-action">
                <a href="{{ route($link_role.'laporan.rombel', $rombel->id) }}?tanggal_pertama={{ request()->tanggal ??  date('d-m-Y') }}&tanggal_terakhir={{ request()->tanggal ?? date('d-m-Y') }}" class="btn btn-sm btn-primary">Lihat Laporan</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group mb-1">
                <label>Pilih tanggal : </label>
                <input type="text" class="form-control datepicker d-inline w-auto" id="tanggal" name="tanggal" value="{{ request()->tanggal ?? date('d-m-Y') }}">
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-md btn-primary btn-loading">Selesai</button>
            </div>
        </div>
    </div>
</form>

@if (request()->tanggal != '')
    
<form action="{{ route($link_role.'absen.rombel', $rombel->id) }}" method="POST">
    @csrf
    <input type="hidden" name="rombel_id" value="{{ $rombel->id }}">
    <input type="hidden" name="tanggal_absen" value="{{ request()->tanggal }}">
    <div class="card">
        <div class="card-header">
            <!-- <h4 class="d-inline">Tasks</h4> -->
            <div class="d-flex w-100 justify-content-between align-items-center">
                <div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cbx-all">
                        <label class="custom-control-label" for="cbx-all">Check All</label>
                    </div>
                </div>
                <div>
                    <select name="check_all_options" id="check-all-options" class="custom-select w-auto">
                        <option value="">Silahkan Pilih</option>
                        <option value="masuk">Masuk</option>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                        <option value="alfa">Alfa</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                @forelse ($rombel->siswas as $siswa)
                    <li class="media">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cbx-{{ $siswa->id }}">
                            <label class="custom-control-label" for="cbx-{{ $siswa->id }}"></label>
                        </div>
                        @php
                            $tanggal = ubah_format_tanggal(request()->tanggal) ?? date('Y-m-d');
                        @endphp
                        <div class="media-body">
                            <div class="float-right">
                                <select name="absen[{{$siswa->id}}]" id="absen-{{ $siswa->id }}" class="custom-select w-auto">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="masuk" {{ $siswa->absens->where('tanggal_absen', $tanggal)->where('keterangan', 'masuk')->count() > 0 ? 'selected' : '' }}>
                                        Masuk
                                    </option>
                                    <option value="sakit" {{ $siswa->absens->where('tanggal_absen', $tanggal)->where('keterangan', 'sakit')->count() > 0 ? 'selected' : '' }}>
                                        Sakit
                                    </option>
                                    <option value="izin" {{ $siswa->absens->where('tanggal_absen', $tanggal)->where('keterangan', 'izin')->count() > 0 ? 'selected' : '' }}>
                                        Izin
                                    </option>
                                    <option value="alfa" {{ $siswa->absens->where('tanggal_absen', $tanggal)->where('keterangan', 'alfa')->count() > 0 ? 'selected' : '' }}>
                                        Alfa
                                    </option>
                                </select>
                            </div>
                            <h6 class="media-title">
                                <a href="#" data-toggle="modal" 
                                    data-target="#siswa" 
                                    data-id="{{ $siswa->id }}" 
                                    data-nis="{{ $siswa->nis }}" 
                                    data-nama="{{ $siswa->nama }}" 
                                    data-rayon="{{ $siswa->rayon->rayon }}">
                                    {{ $siswa->nama }}
                                </a>
                            </h6>
                            <div class="text-small text-muted">{{ $siswa->nis }}
                                <div class="bullet"></div> {{ $siswa->rayon->rayon }}</div>
                        </div>
                    </li>
                @empty
                    <div class="text-center">
                        <p>Tidak ada data</p>
                    </div>
                @endforelse
            </ul>
            <hr>
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    {{ terakhir_update($rombel, request()->tanggal) }}
                </div>
                <div>
                    @if (count($rombel->siswas) > 0)
                        <button class="btn btn-primary btn-md btn-loading" type="submit">Selesai</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endif

@endsection


@section('modal')

<div class="fade modal" id="siswa">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    
                </table>
                <br>
                <br>
                <div class="text-right" id="div_btn_laporkan_keberadaan">
                    <button class="btn btn-sm btn-danger" id="laporkan_keberadaan" data-id="">
                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i> laporkan keberadaan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

<script>

    // Pilih Semua
    $('.card #cbx-all').click(function(){
        $('.card .card-body input[type="checkbox"]').prop('checked', this.checked);
        $('#check-all-options').val('');
    });

    $('#check-all-options').on('change', function(){
        var cao = $(this).val();
        $('.media').each(function(e){
            var checkbox = $(this).find('input[type="checkbox"]');
            console.log(checkbox[0].checked);
            if(checkbox[0].checked == true){
                $(this).find('select').val(cao);
            }
        });
    });

    $('.card-body').on('change', 'input[type="checkbox"]', function(){
        var lengthCheckBox = $('.media').length;
        var lengthCheckedBox = $('.card-body input[type="checkbox"]:checked').length;
        var x = lengthCheckBox - lengthCheckedBox;

        if ((x) == 0 ) {
            $('#cbx-all').prop('checked', true);
        } else if((x) > 0 ){
            $('#cbx-all').prop('checked', false);
        }
    });

    $('#laporkan_keberadaan').hide();
    // Ketika modal siswa ditampilkan
    $('#siswa').on('show.bs.modal', function(e) {

        var id = $(e.relatedTarget).data('id');
        var tanggal = "{{ request()->tanggal }}";

        $.ajax({
            type: "GET",
            url: "{{ route('api.rincian_absen_siswa') }}",
            data: {
                'id' : id,
                'tanggal' : tanggal
            },
            beforeSend: function(){
                $('#siswa').find('table').html('<h3 class="text-secondary text-center">Loading ...</h3>');
            },
            dataType: "JSON",
            success: function (response) {
                var content = $('#siswa').find('table');
                content.html('');
                content.html('<tr><td class="pr-3">Nama</td><td>:</td><td class="pl-2">' + response.nama + '</td></tr><tr><td class="pr-3">NIS</td><td>:</td><td class="pl-2">' + response.nis + '</td></tr><tr><td class="pr-3">Rayon</td><td>:</td><td class="pl-2">' + response.rayon + '</td></tr>');

                if (response.diabsen != '') {
                    content.append('<tr><td class="pr-3">Terakhir diabsen oleh</td><td>:</td><td class="pl-2">' + response.diabsen + '</td></tr>');
                }


                if (response.dilaporkan == true) {
                    $('#laporkan_keberadaan').show();
                    $('#laporkan_keberadaan').attr("disabled", true);
                    $('#laporkan_keberadaan').text("Telah dilaporkan");
                } else{
                    $('#laporkan_keberadaan').show();
                    $('#laporkan_keberadaan').attr("disabled", false);
                    $('#laporkan_keberadaan').attr("data-id", response.id);
                    $('#laporkan_keberadaan').attr("data-nama", response.nama);
                    $('#laporkan_keberadaan').text("Laporkan Siswa");
                }
                
            }
        });


    });
    
    $("#laporkan_keberadaan").click(function() {

        var tanggal = "{{format_db(request()->tanggal)}}";
        var id = $(this).attr('data-id');

        $.ajax({
            type: "GET",
            url: "{{ route('api.laporkan_siswa') }}",
            data: {
                "id" : id,
                "tanggal" : tanggal
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                var id = $('#laporkan_keberadaan').attr('data-id');
                var nama = $('#laporkan_keberadaan').attr('data-nama');
        
                iziToast.success({
                    title: 'Berhasil Dikirim!',
                    message: nama + ' tidak ada dikelas',
                    position: 'bottomRight'
                });

                $('#absen-' + id).val('alfa');
        
                $('#laporkan_keberadaan').attr('disabled', true);
                $('#laporkan_keberadaan').text('Telah dilaporkan', true);
            }
        });


    });


</script>
@endsection 