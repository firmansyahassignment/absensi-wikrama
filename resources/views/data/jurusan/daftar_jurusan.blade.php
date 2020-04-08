@extends('layouts.app')

@section('title', 'Data Jurusan')

@section('breadcrumb')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                <a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                    <li class="dropdown-title">Usaha</li>
                    <li><a href="#" data-toggle="modal" data-target="#tambah_jurusan" class="dropdown-item">Tambah Data</a></li>
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
                        <th>Jurusan</th>
                        <th>Jumlah Rombel</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jurusans->sortBy('jurusan') as $jurusan)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $jurusan->jurusan }}({{ $jurusan->short }})</td>
                                <td class="text-center">{{ $jurusan->rombels->count() ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route($link_role.'data.jurusan.detail_jurusan', $jurusan->id) }}" class="btn btn-sm btn-primary">detail</a>
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

<div class="modal fade" tabindex="-1" role="dialog" id="tambah_jurusan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route($link_role.'data.jurusan.simpan_jurusan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="singkatan">Singkatan</label>
                        <input type="text" class="form-control" name="singkatan" id="singkatan" required>
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