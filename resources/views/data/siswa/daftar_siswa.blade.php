@extends('layouts.app')

@section('title', 'Data Siswa')

@section('breadcrumb')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                <a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                    <li class="dropdown-title">Usaha</li>
                    <li><a href="{{ route($link_role.'data.siswa.tambah_siswa') }}" class="dropdown-item">Tambah Data</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#unggah_siswa_xl" class="dropdown-item">Unggah data siswa (XL)</a></li>
                    <li class="dropdown-title">Akun Orangtua</li>
                    <li><a href="{{ route($link_role.'data.siswa.aktifkan_akun_orangtua') }}" class="dropdown-item">Aktifkan</a></li>
                    <li><a href="{{ route($link_role.'data.siswa.nonaktifkan_akun_orangtua') }}" class="dropdown-item">Matikan</a></li>
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
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Rombel</th>
                        <th>Rayon</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @php
                            $no = ($siswas->currentpage()-1) * $siswas->perpage() + 1;
                        @endphp
                        @forelse ($siswas as $siswa)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td class="text-center">{{ $siswa->jenis_kelamin }}</td>
                                <td class="text-center">{{ $siswa->rombel }}</td>
                                <td class="text-center">{{ $siswa->rayon }}</td>
                                <td class="text-center">
                                    <a href="{{ route($link_role.'data.siswa.detail_siswa', $siswa->id) }}" class="btn btn-sm btn-primary">detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $siswas->links() }}
            </div>
        </div>
    </div>
@endsection

@section('modal')

<div class="modal fade" tabindex="-1" role="dialog" id="unggah_siswa_xl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route($link_role.'data.siswa.unggah_data_siswa') }}" method="POST" enctype="multipart/form-data">
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
                            <li>NIS : 11706176 / 11029849</li>
                            <li>Nama : Jhon Due / Sri Sulistiawati</li>
                            <li>Jenis Kelamin : L / P</li>
                            <li>Rayon : Cicurug 1 / Cisarua 4</li>
                            <li>Rombel : RPX XI-1 / TKJ X-4</li>
                        </ul>
                        
                        <small>*Jika data telah ada sebelumnya maka akan terupdate otomatis sesuai dengan nis siswa.</small>
                        <br>
                        <small>*Jika data rayon tidak ada, maka otomatis akan terbuat.</small>
                        <br>
                        <small>*Untuk akun orangtua tidak otomatis. Sehingga jika ingin mengaktifkan akun orang tua silahkan pilih pengaturan dan aktifkan seluruh akun orangtua.</small>
                        <br>
                        <small>*Harap pastikan kembali agar input sesuai dengan ketentuan.</small>
                    </p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <small>Download template <a href="{{ route($link_role.'data.siswa.donwload_template') }}">disini</a></small>
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