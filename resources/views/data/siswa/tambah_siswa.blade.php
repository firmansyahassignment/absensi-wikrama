@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.siswa.daftar_siswa') }}">Daftar Siswa</a></div>
    <div class="breadcrumb-item">Tambah Siswa</div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Siswa</h4>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form action="{{ route($link_role.'data.siswa.simpan_siswa') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" required value="{{ old('nis') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select" required>
                            <option value=""></option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel">Rombel</label>
                        <select name="rombel" id="rombel" class="custom-select" required>
                            <option value=""></option>
                            @foreach ($rombels as $rombel)
                            <option value="{{ $rombel->id }}" {{ (old('rombel') == $rombel->id) ? 'selected' : '' }}>{{ $rombel->rombel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel">Rayon</label>
                        <select name="rayon" id="rayon" class="custom-select" required>
                            <option value=""></option>
                            @foreach ($rayons as $rayon)
                            <option value="{{ $rayon->id }}" {{ (old('rayon') == $rayon->id) ? 'selected' : '' }}>{{ $rayon->rayon }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel">Aktikan Akun Orangtua?</label>
                        <select name="orangtua" id="orangtua" class="custom-select">
                            <option value=""></option>
                            <option value="true" {{  old('orangtua') == "true" ? 'selected' : '' }}>Ya</option>
                            <option value="false" {{ old('orangtua') == "false" ? 'selected' : '' }}>Tidak</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary btn-md" type="submit">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('modal')

@endsection

@section('script')
    
@endsection