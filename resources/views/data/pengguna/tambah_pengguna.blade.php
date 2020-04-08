@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.pengguna.daftar_pengguna') }}">Daftar pengguna</a></div>
    <div class="breadcrumb-item">Tambah Pengguna</div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Pengguna</h4>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form action="{{ route($link_role.'data.pengguna.simpan_pengguna') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
                            <option value=""></option>
                            <option value="L" {{ ((old('jenis_kelamin')) == 'L') ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ ((old('jenis_kelamin')) == 'P') ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">No Telepon</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <div class="pr-2">
                            <select name="roles[]" id="roles" class="select2 custom-select w-100" multiple required>
                                <option value="1" 
                                @for ($i = 0; $i < count(old('roles') ?? []); $i++)
                                @if (old('roles')[$i] == 1)
                                    selected
                                @endif
                                @endfor>
                                    Piket dan Kurikulum
                                </option>
                                <option value="2" 
                                @for ($i = 0; $i < count(old('roles') ?? []); $i++)
                                @if (old('roles')[$i] == 2)
                                    selected
                                @endif
                                @endfor>
                                    Guru
                                </option>
                                <option value="3" 
                                @for ($i = 0; $i < count(old('roles') ?? []); $i++)
                                @if (old('roles')[$i] == 3)
                                    selected
                                @endif
                                @endfor>
                                    Pembimbing Rayon
                                </option>
                                <option value="4" 
                                @for ($i = 0; $i < count(old('roles') ?? []); $i++)
                                @if (old('roles')[$i] == 4)
                                    selected
                                @endif
                                @endfor>
                                    Orangtua
                                </option>
                            </select>
                        </div>
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