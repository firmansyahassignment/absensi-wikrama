@extends('layouts.app')

@section('title', 'Detail Siswa ' . $siswa->nama)

@section('breadcrumb')
@if (auth()->user()->role != '3')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.siswa.daftar_siswa') }}">Daftar Siswa</a></div>
    <div class="breadcrumb-item">{{ $siswa->nama }}</div>
</div>
@endif
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Rincian</h4>
            <div class="card-header-action dropdown">
                <a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <li class="dropdown-title">Usaha</li>
                    <li><a href="{{ route($link_role.'data.siswa.edit_siswa', $siswa->id) }}" class="dropdown-item">Ubah detail</a></li>
                    <li class="dropdown-title">Download</li>
                    <li><a target="_blank" href="{{ route($link_role.'data.siswa.download_pdf_siswa', $siswa->id) }}" class="dropdown-item">Download PDF</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td class="pr-2">NIS</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $siswa->nis }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Nama</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $siswa->nama }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Jenis Kelamin</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Rombel</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $siswa->rombel->rombel }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Rayon</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $siswa->rayon->rayon }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Akun Orangtua</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ isset($siswa->orangtua->nama) ? "Dibuat" : "Belum dibuat" }}</td>
                </tr>
                @if (isset($siswa->orangtua->nama))
                    <tr>
                        <td class="pr-2">Username</td>
                        <td>:</td>
                        <td class="pl-1 font-weight-bold">{{ $siswa->orangtua->username }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">Password</td>
                        <td>:</td>
                        <td class="pl-1 font-weight-bold"><small>Default NIS siswa</small></td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    
@endsection

@section('modal')

@endsection

@section('script')
    
@endsection