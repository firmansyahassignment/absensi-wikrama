@extends('layouts.app')

@section('title', 'Data Pengguna')

@section('breadcrumb')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                <a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                    <li class="dropdown-title">Usaha</li>
                    <li><a href="{{ route($link_role.'data.pengguna.tambah_pengguna') }}" class="dropdown-item">Tambah Data</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#unggah_pengguna_xl" class="dropdown-item">Unggah data pengguna (XL)</a></li>
                </ul>
            </h4>
            
            <form class="card-header-form">
                <input type="text" name="q" class="form-control" placeholder="Search" value="{{ request()->q }}">
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-md table-bordered table-hover">
                    <thead class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Sebagai</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($users->sortBy('nama') as $user)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->jenis_kelamin ?? 'Belum diinput' }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <label for="" class="badge badge-sm badge-light">{{ $role->role }}</label>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route($link_role.'data.pengguna.detail_pengguna', $user->id) }}" class="btn btn-sm btn-primary">detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('modal')

<div class="modal fade" tabindex="-1" role="dialog" id="unggah_pengguna_xl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route($link_role.'data.pengguna.unggah_data_xl') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Unggah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silahkan upload file :</p>
                    <input type="file" name="file" id="file" required>
                    <br>
                    <br>
                    <p>
                        Catatan :
                        <ul class="mt-0">
                            <li>Nama : Jhon Due / Sri Sulistiawati</li>
                            <li>Jenis Kelamin : L / P</li>
                            <li>Email : Jhon@Due.com / Kosong</li>
                            <li>Phone : 08122323928... / +62 30934 34092 ... / Kosong</li>
                            <li>Role : Datanya yaitu Guru, Piket dan Kurikulum. Jika keduanya gunakan koma sebagai pemisah. Contoh : guru,piket dan pembimbing rayon</li>
                        </ul>
                        <small>*Email dan No. Telepon opsional untuk diisi.</small>
                        <br>
                        <small>*Perlu diperhatikan bahwa kolom role sangat sensitif.</small>
                        <br>
                        <small>*Harap pastikan kembali agar input sesuai dengan ketentuan.</small>
                    </p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <small>Download template <a href="{{ route($link_role.'data.pengguna.download_template_xl') }}">disini</a></small>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-loading">Selesai</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
    
@endsection