@extends('layouts.app')

@section('title', 'Data Rombel')

@section('breadcrumb')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Daftar Rombel</h4>
            <div class="card-header-action">
                <a href="#" data-toggle="modal" data-target="#tambah_rombel" class="btn btn-primary btn-md">Tambah Rombel</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-md table-bordered table-hover">
                    <thead class="text-center">
                        <th>No</th>
                        <th>Rombel</th>
                        <th>Jurusan</th>
                        <th>Jumlah Siswa</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($rombels->sortBy('rombel') as $rombel)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $rombel->rombel }}</td>
                                <td>{{ $rombel->jurusan->jurusan }}</td>
                                <td class="text-center">{{ $rombel->siswas->count() }}</td>
                                <td class="text-center"><a href="{{ route($link_role.'data.rombel.detail', $rombel->id) }}" class="btn btn-sm btn-primary">detail</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')

{{-- Ubah Rombel --}}

<div class="modal fade" id="tambah_rombel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route($link_role.'data.rombel.tambah') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Rombel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="custom-select" required>
                            <option value=""></option>
                            @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <select name="angkatan" id="angkatan" class="custom-select" required>
                            <option value=""></option>
                            <option value="10">X</option>
                            <option value="11">XI</option>
                            <option value="12">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel_ke">Rombel Ke-</label>
                        <select name="rombel_ke" id="rombel_ke" class="custom-select" required>
                            <option value=""></option>
                            @for ($i = 1; $i <= 20 ; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right bg-white">
                    <button class="btn btn-primary btn-sm" type="submit">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
    
@endsection