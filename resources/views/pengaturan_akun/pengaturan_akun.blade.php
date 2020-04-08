@extends('layouts.app')

@section('title', 'Pengaturan Akun')

@section('breadcrumb')

@endsection

@section('content')

<div class="card">
    <form method="POST" action="{{ route($link_role.'simpan_pengaturan_akun') }}">
        @csrf
        <div class="card-header">
            <h4>Data Diri {{ $user->nama }}</h4>
            <div class="card-header-action">
                <a href="{{ route($link_role.'ubah_autentikasi') }}" class="btn btn-primary btn-loading">Ubah Autentikasi</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $user->nama }}" required="" name="nama">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" required="" value="{{ $user->phone }}" required>
                @error('no_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" required="" value="{{ $user->email }}" required name="email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <p><small>*Berlaku untuk semua akun anda</small></p>
            <div>
                <button class="btn btn-primary btn-loading">Selesai</button>
            </div>
        </div>
    </form>
</div>

@endsection


@section('modal')

@endsection



@section('script')

@endsection