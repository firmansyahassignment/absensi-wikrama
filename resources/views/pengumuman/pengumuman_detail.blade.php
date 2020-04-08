@extends('layouts.app')

@section('title', 'Pengumuman')

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'pengumuman') }}">Pengumuman</a></div>
    <div class="breadcrumb-item">{{ Str::limit($pengumuman->subject, 20) }}</div>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4>{{{ $pengumuman->subject }}}</h4>
        @if (Auth::user()->role == 1)
        <div class="card-header-action dropdown">
            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li class="dropdown-title">Usaha</li>
                <li><a href="#" class="dropdown-item" data-confirm="Hapus data?|Lanjutkan untuk menghapus?" data-confirm-yes="document.getElementById('hapus_pengumuman').submit();">Hapus</a></li>
                <form action="{{ route($link_role.'pengumuman.hapus', $pengumuman->id) }}" method="post" id="hapus_pengumuman">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{ $pengumuman->id }}">
                </form>
            </ul>
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-{{ Auth::user()->role != 1 ? '12' : '8' }}">
        <div class="card">
            <div class="card-body">
                {!! $pengumuman->pengumuman !!}
            </div>
            <div class="card-footer">
                <p class="text-muted">Pengumuman ini ditulis pada {{ format_manusia($pengumuman->created_at) }} pukul {{ jam_manusia($pengumuman->created_at) }} oleh {{ $pengumuman->user->nama }}.</p>
            </div>
        </div>
    </div>
    @if (Auth::user()->role == 1)
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4>Dibaca Oleh</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border" id="dibaca_oleh">
                    <h3 class="text-center text-secondary">Memuat ...</h3>
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>


@endsection


@section('modal')

@endsection



@section('script')

@if (Auth::user()->role == 1)
    <script>


        readedby();

        setInterval(() => {
            readedby();
        }, 200);
        function readedby() {
            $.ajax({
                type: "GET",
                url: "{{ route('api.pengumuman_dibaca_oleh') }}",
                data: {
                    'pengumuman_id' : "{{ $pengumuman->id }}"
                },
                dataType: "JSON",
                success: function (response) {
                    var el = $('#dibaca_oleh');
                    el.html('');
                    if (response.length > 0) {
                        response.forEach(a => {
                            el.append('<li class="media"><img class="mr-3 rounded-circle" width="50" src="{{asset('assets/dist/img/avatar/avatar-1.png')}}" alt="avatar"><div class="media-body mt-1"><h6 class="media-title">' + a.nama + '</h6><div class="text-small text-muted">' + a.sebagai + '<div class="bullet"></div> <span class="text-primary">' + a.pada + '</span></div></div></li>');
                        });
                    } else{
                        el.html('<h3 class="text-center text-secondary">Belum ada</h3>');
                    }
                }
            });
        }
    </script>
@endif

@endsection