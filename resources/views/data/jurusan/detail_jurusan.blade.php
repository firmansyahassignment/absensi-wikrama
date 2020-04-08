@extends('layouts.app')

@section('title', 'Detail Jurusan' . $jurusan->jurusan )

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.jurusan.daftar_jurusan') }}">Daftar jurusan</a></div>
    <div class="breadcrumb-item">{{ $jurusan->jurusan }}</div>
</div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Rincian</h4>
            <div class="card-header-action dropdown">
                <a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <li class="dropdown-title">Usaha</li>
                    <li><a href="#" data-toggle="modal" data-target="#ubah_jurusan" class="dropdown-item">Ubah detail</a></li>
                    <li><a href="#"  data-confirm="Hapus data?|Lanjutkan untuk menghapus?" data-confirm-yes="document.getElementById('hapus_jurusan').submit();" class="dropdown-item">Hapus</a></li>
                    <form action="{{ route($link_role.'data.jurusan.delete_jurusan', $jurusan->id) }}" method="post" id="hapus_jurusan">
                        @method('DELETE')
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td class="pr-2">Jurusan</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $jurusan->jurusan }}({{ $jurusan->short }})</td>
                </tr>
                <tr>
                    <td class="pr-2">Jumlah Rombel</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $jurusan->rombels->count() ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Daftar Rombel</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-md table-hover">
                <thead class="text-center">
                    <th>No</th>
                    <th>Rombel</th>
                    <th>Jumlah Siswa</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($jurusan->rombels as $rombel)
                        <tr>
                            <td class="text-center">{{$no++ }}</td>
                            <td class="text-center">{{ $rombel->rombel }}</td>
                            <td class="text-center">{{ $rombel->siswas->count() ?? '' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

@section('modal')

<div class="modal fade" tabindex="-1" role="dialog" id="ubah_jurusan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route($link_role.'data.jurusan.update_jurusan', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{ $jurusan->jurusan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="singkatan">Singkatan</label>
                        <input type="text" class="form-control" name="singkatan" id="singkatan" value="{{ $jurusan->short }}" required>
                    </div>
                </div>
                <div class="modal-footer text-right bg-white">
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