@extends('layouts.app')

@section('title', 'Laporkan Kesalahan')

@section('content')

<div class="card">
    <form method="POST" action="{{ route('guru.simpan_laporkan_kesalahan') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h4>Form Laporan Kesalahan</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Jenis kesalahan*</label>
                <select name="jenis_kesalahan" id="jenis_kesalahan" class="custom-select @error('jenis_kesalahan') is-invalid @enderror" required>
                    <option value=""></option>
                    @foreach ($jenis_kesalahans as $jenis_kesalahan)
                    <option value="{{ $jenis_kesalahan->id }}" {{ old('jenis_kesalahan') == $jenis_kesalahan->id ? 'selected' : '' }}>{{ $jenis_kesalahan->jenis_kesalahan }}</option>
                    @endforeach
                </select>
                @error('jenis_kesalahan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Device yang digunakan*</label>
                <select name="device_yang_digunakan" id="device_yang_digunakan" class="custom-select @error('device_yang_digunakan') is-invalid @enderror" required>
                    <option value=""></option>
                    <option value="laptop" {{ old('device_yang_digunakan') == 'laptop' ? 'selected' : '' }}>Laptop/Komputer</option>
                    <option value="smartphone" {{ old('device_yang_digunakan') == 'smartphone' ? 'selected' : '' }}>Smartphone</option>
                </select>
                @error('device_yang_digunakan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Dekripsikan kesalahan*</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tambahkan tangkapan layar</label>
                <div>
                    <input type="file" name="tangkapan_layar" id="tangkapan_layar" class="form-control pt-2 @error('tangkapan_layar') is-invalid @enderror">
                </div>
                @error('tangkapan_layar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary btn-loading">Selesai</button>
        </div>
    </form>
</div>


@endsection