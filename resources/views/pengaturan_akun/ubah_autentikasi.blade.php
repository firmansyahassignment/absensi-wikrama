@extends('layouts.app')

@section('title', 'Ubah Password')

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'pengaturan_akun') }}">Pengaturan Akun</a></div>
    <div class="breadcrumb-item">Ubah Password</div>
</div>
@endsection

@section('content')

<div class="card">
    <form method="POST" action="{{ route($link_role.'simpan_ubah_autentikasi') }}">
        @csrf
        <div class="card-header">
            <h4>Ubah Autentikasi</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') ?? $user->username }}" name="username" required>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
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