@extends('layouts.app')

@section('title', 'Data Rayon')

@section('breadcrumb')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                <a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                    <li class="dropdown-title">Usaha</li>
                    <li><a href="{{ route($link_role.'data.rayon.tambah_rayon') }}" class="dropdown-item">Tambah Data</a></li>
                </ul>
            </h4>
            
            <form class="card-header-form">
                <input type="text" name="q" class="form-control" placeholder="Search" value="{{ request()->q }}">
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-md table-bordered table-hover">
                    <thead class="text-center">
                        <th>No</th>
                        <th>Rayon</th>
                        <th>Pembimbing Rayon</th>
                        <th>Jumlah Siswa</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($rayons->sortBy('nama') as $rayon)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $rayon->rayon }}</td>
                                <td>{{ $rayon->pembimbing->nama ?? '-' }}</td>
                                <td class="text-center">{{ $rayon->siswas->count() }}</td>
                                <td class="text-center">
                                    <a href="{{ route($link_role.'data.rayon.detail_rayon', $rayon->id) }}" class="btn btn-sm btn-primary">detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('modal')

@endsection

@section('script')
    
@endsection