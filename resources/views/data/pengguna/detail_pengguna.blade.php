@extends('layouts.app')

@section('title', 'Detail Pengguna ' . $user->nama)

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.pengguna.daftar_pengguna') }}">Daftar Pengguna</a></div>
    <div class="breadcrumb-item">{{ $user->nama }}</div>
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
                    <li><a href="{{ route($link_role.'data.pengguna.edit_pengguna', $user->id) }}" class="dropdown-item">Ubah detail</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td class="pr-2">Nama</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $user->nama }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Jenis Kelamin</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $user->jenis_kelamin ?? 'Belum diinput' }}</td>
                </tr>
                <tr>
                    <td class="pr-2">No Telepon</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $user->phone ?? 'Belum diinput' }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Email</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">
                        @if (isset($user->email))
                            <a href="mailto:{{ $user->email }}" target="_blank">{{ $user->email }}</a>
                        @else
                            Belum diinput
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="pr-2">Username</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $user->username }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Password</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">Tidak dapat ditampilkan (<small>default username</small>)</td>
                </tr>
                <tr>
                    <td class="pr-2">Sebagai</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">
                        @foreach ($user->roles as $role)
                            <span class="badge badge-light badge-sm">{{ $role->role }}</span>
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
@endsection

@section('modal')

@endsection

@section('script')
    
@endsection