@extends('layouts.app')

@section('title', 'Pengumuman')

@section('breadcrumb')

@endsection

@section('content')


<div class="card">
    <div class="card-header">
        <h4>Daftar Pengumuman</h4>
        @if (Auth::user()->role == 1)
        <div class="card-header-action">
            <a href="{{ route('piket_kurikulum.pengumuman.buat') }}" class="btn btn-sm btn-primary">Buat Pengumuman</a>
        </div>
        @endif
    </div>
</div>

<div id="seluruh_pengumuman">
        <div class="d-flex align-items-center justify-content-center"><h3 class="text-secondary">Memuat ...</h3></div>
</div>

@endsection


@section('modal')

@endsection



@section('script')

<script>

    get_seluruh_pengumuman();

    setInterval(() => {
        get_seluruh_pengumuman();
    }, 3000);

    function get_seluruh_pengumuman(){
        $.ajax({
            type: "GET",
            url: "{{ route('api.pengumuman') }}",
            data: "",
            dataType: "JSON",
            success: function (response) {
                $el = $('#seluruh_pengumuman');
                if (response.length > 0) {
                    $el.html('');
                    response.forEach(a => {
                        $el.append('<a href="'+ a.route + '"><div class="card card-statistic-1 my-0"><div class="card-icon bg-' + a.icon + '"><i class="fas fa-bell"></i></div><div class="card-wrap"><div class="card-header"><h4>' + a.created_at + '</h4></div><div class="card-body">' + a.subject + '</div></div></div></a>');
                    });
                } else{
                    $el.html('<div class="d-flex align-items-center justify-content-center"><h3 class="text-secondary">Tidak ada pengumuman</h3></div>');
                }
            }
        });
    }
</script>

@endsection