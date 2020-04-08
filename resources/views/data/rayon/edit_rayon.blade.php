@extends('layouts.app')

@section('title', 'Edit Rayon ' . $rayon->rayon)

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.rayon.daftar_rayon') }}">Daftar rayon</a></div>
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.rayon.detail_rayon', $rayon->id) }}">Detail rayon</a></div>
    <div class="breadcrumb-item">{{ $rayon->rayon }}</div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit rayon</h4>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form action="{{ route($link_role.'data.rayon.update_rayon', $rayon->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="rayon">Rayon</label>
                        <input type="text" class="form-control" name="rayon" id="rayon" required value="{{ old('rayon') ?? $rayon->rayon }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="pembimbing">Pembimbing Rayon</label>
                        <select name="pembimbing" id="pembimbing" class="custom-select" required>
                            <option value=""></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{  $rayon->pembimbing_id == $user->id ? 'selected' : '' }}>{{ $user->nama }}</option>
                            @endforeach
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