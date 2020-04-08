@extends('layouts.app')

@section('title', 'Edit Siswa ' . $siswa->nama)

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.siswa.daftar_siswa') }}">Daftar Siswa</a></div>
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.siswa.detail_siswa', $siswa->id) }}">Detail Siswa</a></div>
    <div class="breadcrumb-item">{{ $siswa->nama }}</div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Siswa</h4>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form action="{{ route($link_role.'data.siswa.update_siswa', $siswa->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" required value="{{ old('nis') ?? $siswa->nis }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required value="{{ old('nama') ?? $siswa->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select" required>
                            <option value=""></option>
                            <option value="L" {{ ((old('jenis_kelamin') ?? $siswa->jenis_kelamin) == 'L') ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ ((old('jenis_kelamin') ?? $siswa->jenis_kelamin) == 'P') ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel">Rombel</label>
                        <select name="rombel" id="rombel" class="custom-select" required>
                            <option value=""></option>
                            @foreach ($rombels as $rombel)
                            <option value="{{ $rombel->id }}" {{ ((old('rombel') ?? $siswa->rombel_id) == $rombel->id) ? 'selected' : '' }}>{{ $rombel->rombel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel">Rayon</label>
                        <select name="rayon" id="rayon" class="custom-select" required>
                            <option value=""></option>
                            @foreach ($rayons as $rayon)
                            <option value="{{ $rayon->id }}" {{ ((old('rayon') ?? $siswa->rayon_id) == $rayon->id) ? 'selected' : '' }}>{{ $rayon->rayon }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel">Aktikan Akun Orangtua?</label>
                        <select name="orangtua" id="orangtua" class="custom-select">
                            <option value=""></option>
                            <option value="true" {{ ($siswa->orangtua_id != null ? true : false) == true ? 'selected' : '' }}>Ya</option>
                            <option value="false" {{ ($siswa->orangtua_id == null ? true : false) == true ? 'selected' : '' }}>Tidak</option>
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