@extends('layouts.app')

@section('title', 'Detail Rayon ' . $rayon->rayon)

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.rayon.daftar_rayon') }}">Daftar rayon</a></div>
    <div class="breadcrumb-item">{{ $rayon->rayon }}</div>
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
                    <li><a href="{{ route($link_role.'data.rayon.edit_rayon', $rayon->id) }}" class="dropdown-item">Ubah detail</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td class="pr-2">Rayon</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $rayon->rayon }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Jumlah Siswa</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $rayon->siswas->count() }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Pembimbing Rayon</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $rayon->pembimbing->nama ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Daftar Siswa</h4>
            <div class="card-header-action">
                
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm">
                <thead class="text-center">
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Rombel</th>
                    <th>Akun orangtua</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($rayon->siswas as $siswa)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td class="text-center">{{ $siswa->rombel->rombel ?? '-' }}</td>
                        <td class="text-center">{{ $siswa->orangtua_id == null ? 'non-aktif' : 'aktif' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

@section('modal')

@endsection

@section('script')
    
@endsection