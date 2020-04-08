@extends('layouts.app')

@section('title', 'Buat Pengumuman')

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'pengumuman') }}">Pengumuman</a></div>
    <div class="breadcrumb-item">Buat Pengumuman</div>
</div>
@endsection

@section('content')
<form action="{{ route('piket_kurikulum.pengumuman.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Buat Pengumuman</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="">Subject</label>
                        <div class="">
                            <input type="text" class="form-control w-auto" name="subject" value="{{ old('subject') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">Dikirim ke</label>
                        <div class="">
                            <select class="w-100 select2 w-100" name="dikirim_ke[]" multiple value="{{ old('dikirim_ke') }}" required>
                              <option value="1">Piket dan Kurikulum</option>
                              <option value="2">Guru</option>
                              <option value="3">Pembimbing Rayon</option>
                              <option value="4">Orangtua</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">Pengumuman</label>
                        <div class="">
                            <textarea class="summernote" name="pengumuman" required>{{ old('pengumuman') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=""></label>
                        <div class=" text-right">
                            <button class="btn btn-primary btn-loading">Selesai</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('script')
    
@endsection