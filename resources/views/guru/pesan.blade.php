@extends('layouts.app')

@section('title', 'Pesan')

@section('breadcrumb')

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Daftar Pesan</h4>
        <div class="card-header-action">
            <button class="btn btn-md btn-danger"><i class="fas fa-exclamation-triangle    "></i> Laporkan kesalahan</button>
        </div>
    </div>
    <div class="card-body">
        <div class="row pesan-group">
            <div class="col-md-4 pesan-form-orang">
                <ul class="list-unstyled list-unstyled-border daftar-pesan">
                    @foreach ($users as $user)
                    <li class="media">
                        <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/dist/img/avatar/avatar-1.png')}}" alt="avatar">
                        <div class="media-body" onclick="ubah_container_pesan({{ $user->id }})">
                            <div class="float-right text-primary"><small  data-trigger="hover" data-container="body" data-toggle="popover" data-placement="top" data-content="{{ array_object_to_text($user->roles) }}">Sebagai</small></div>
                            <div class="media-title">{{ $user->nama }}</div>
                            @php
                                $pesan_terakhir = $user->pesan_diterima;
                                echo $pesan_terakhir;
                            @endphp
                            <span class="text-small text-muted"><i class="fas fa-circle fa-sm text-light"></i> </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card pesan-form">
                    <div class="card-header">
                        <h4>Farhan A Mujib</h4>
                        <div class="card-header-action dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <li class="dropdown-title">Usaha</li>
                                <li><a href="#" class="dropdown-item">Hapus History</a></li>
                                <li class="dropdown-title">Lainnya</li>
                                <li><a href="#" class="dropdown-item">Laporkan Kesalahan</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="item-pesan pesan-datang">
                            <div class="alert alert-light">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, possimus adipisci? Veritatis cupiditate numquam totam est alias optio quis reprehenderit!
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-dark">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="item-pesan pesan-dikirim">
                            <div class="alert alert-success">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, aperiam quia illum ducimus quidem voluptatum molestias mollitia error aspernatur fugiat?
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-white">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="item-pesan pesan-datang">
                            <div class="alert alert-light">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, possimus adipisci? Veritatis cupiditate numquam totam est alias optio quis reprehenderit!
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-dark">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="item-pesan pesan-datang">
                            <div class="alert alert-light">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, possimus adipisci? Veritatis cupiditate numquam totam est alias optio quis reprehenderit!
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-dark">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="item-pesan pesan-datang">
                            <div class="alert alert-light">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, possimus adipisci? Veritatis cupiditate numquam totam est alias optio quis reprehenderit!
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-dark">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="item-pesan pesan-dikirim">
                            <div class="alert alert-success">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, aperiam quia illum ducimus quidem voluptatum molestias mollitia error aspernatur fugiat?
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-white">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="item-pesan pesan-dikirim">
                            <div class="alert alert-success">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, aperiam quia illum ducimus quidem voluptatum molestias mollitia error aspernatur fugiat?
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-white">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="item-pesan pesan-datang">
                            <div class="alert alert-light">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, possimus adipisci? Veritatis cupiditate numquam totam est alias optio quis reprehenderit!
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-dark">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                        <div class="item-pesan pesan-datang">
                            <div class="alert alert-light">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, possimus adipisci? Veritatis cupiditate numquam totam est alias optio quis reprehenderit!
                                <div class="tanggal-pesan text-right mt-2">
                                    <small class="text-dark">23/2/2020 <div class="bullet"></div> 09:30</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="text" class="form-control" placeholder="Masukan pesan ... [Enter untuk mengirim]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('modal')

@endsection



@section('script')
<!-- Scrool Bottom -->
<script>
    $('.pesan-form .card-body').scrollTop($('.pesan-form .card-body')[0].scrollHeight);

</script>
@endsection