@extends('layouts.app')

@section('title', 'Cari Siswa')

@section('breadcrumb')


@endsection

@section('content')

<!-- Form Pencarian -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="" method="GET" class="card-header-form">
            <input type="text" class="form-control" name="cari_siswa" id="cari_siswa" placeholder="Cari nis, nama atau orangtua siswa ..." autofocus onkeyup="cari_siswa_ajax()">
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h4>Tampilkan
            <select name="tampil" id="jumlah_tampil" class="border-0" onchange="cari_siswa_ajax()">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select> data
        </h4>
        <div class="card-header-action">
            <a target="_blank" href="{{ route($link_role.'laporkan_kesalahan') }}" class="btn btn-md btn-danger"><i class="fas fa-exclamation-triangle"></i> Laporkan kesalahan</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row" id="hasil_cari_siswa">
            @foreach ($siswas->take(10) as $siswa)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route($link_role.'laporan.siswa', $siswa->id) }}" class="non-hoverable">
                            <div class="media">
                                <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/dist/img/avatar/avatar-1.png')}}" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-muted badge badge-light">{{ $siswa->rayon->short }}</div>
                                    <div class="media-title">{{ $siswa->nama }}</div>
                                    <span class="text-small text-muted">{{ $siswa->nis }} <div class="bullet"></div> {{ $siswa->rombel->rombel }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection


@section('modal')



@endsection


@section('script')

<script>
    // Search

    
    function cari_siswa_ajax(keyword) {
            var keyword = $('#cari_siswa').val();
            var jml_tampil = $('#jumlah_tampil').val();

            $.ajax({
                type: "GET",
                url: "{{ url('api/cari-siswa') }}",
                data: {
                    "q" : keyword
                },
                dataType: "JSON",
                beforeSend: function(){
                    $('#hasil_cari_siswa').html('<div class="col-md-12"><h3 class="text-center text-secondary">Loading ...</h3></div>');
                },
                success: function (response) {
                    var lengthresponse = response.length;
                    
                    $('#hasil_cari_siswa').html('');
                    if (lengthresponse > 0) {
                        for (let index = 0; index < response.length; index++) {
                            if (index <= jml_tampil - 1) {
                                const item = response[index];
                                var html = '<div class="col-md-4"><div class="card"><div class="card-body"><a href="' + item.link + '" class="non-hoverable"><div class="media"><img class="mr-3 rounded-circle" width="50" src="{{ asset('assets/dist/img/avatar/avatar-1.png')}}" alt="avatar"><div class="media-body"><div class="float-right text-muted badge badge-light">' + item.rayon + '</div><div class="media-title">' + item.nama + '</div><span class="text-small text-muted">' + item.nis + ' <div class="bullet"></div> ' + item.rombel + '</span></div></div></a></div></div></div>';
                                $('#hasil_cari_siswa').append(html);
                            }
                        }
                    }
                    else{
                        $('#hasil_cari_siswa').html('<div class="col-md-12"><h3 class="text-center text-secondary">Tidak ditemukan</h3></div>');
                    }
                }
            });
        }
</script>

@endsection 