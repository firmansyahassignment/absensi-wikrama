@extends('layouts.app')

@section('title', 'Detail Rombel ' . $rombel->rombel)

@section('breadcrumb')
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route($link_role.'data.rombel') }}">Daftar Rombel</a></div>
    <div class="breadcrumb-item">{{ $rombel->rombel }}</div>
</div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Rincian</h4>
            <div class="card-header-action dropdown">
                <a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <li class="dropdown-title">Usaha</li>
                    <li><a href="#" data-toggle="modal" data-target="#ubah_detail" class="dropdown-item">Ubah detail</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td class="pr-2">Rombel</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $rombel->rombel }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Jurusan</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $rombel->jurusan->jurusan }}</td>
                </tr>
                <tr>
                    <td class="pr-2">Jumlah Siswa</td>
                    <td>:</td>
                    <td class="pl-1 font-weight-bold">{{ $rombel->siswas->count() }} Siswa</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Daftar Siswa</h4>
            <div class="card-header-action dropdown">
                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Pengaturan</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <li class="dropdown-title">Usaha</li>
                    <li><a href="#" data-toggle="modal" data-target="#unggah_siswa_xl" class="dropdown-item">Unggah Data Siswa (XL)</a></li>
                    <li class="dropdown-title">Download</li>
                    <li><a target="_blank" href="{{ route($link_role.'data.rombel.download_pdf_siswa', $rombel->id) }}" class="dropdown-item">PDF</a></li>
                    <li><a target="_blank" href="{{ route($link_role.'data.rombel.download_xl_siswa', $rombel->id ) }}" class="dropdown-item">XL</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead class="text-center">
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Rayon</th>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($rombel->siswas as $siswa)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td class="text-center">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td class="text-center">{{ $siswa->rayon->rayon }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center"><h3 class="text-secondary">Tidak ada data</h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="unggah_siswa_xl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route($link_role.'data.rombel.import_siswa', $rombel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Unggah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silahkan upload file :</p>
                    <input type="file" name="file" id="file" required>
                    <br>
                    <br>
                    <p>
                        Catatan :
                        <ul class="mt-0">
                            <li>NIS : 11706176 / 11029849</li>
                            <li>Nama : Jhon Due / Sri Sulistiawati</li>
                            <li>Jenis Kelamin : L / P</li>
                            <li>Rayon : Cicurug 1 / Cisarua 4</li>
                        </ul>
                        
                        <small>*Jika data telah ada sebelumnya maka akan terupdate otomatis sesuai dengan nis siswa.</small>
                        <br>
                        <small>*Jika data rayon tidak ada, maka otomatis akan terbuat.</small>
                        <br>
                        <small>*Harap pastikan kembali agar input sesuai dengan ketentuan.</small>
                    </p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <small>Download template <a href="{{ route($link_role.'data.rombel.download_template', $rombel->id) }}">disini</a></small>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-loading">Selesai</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Ubah Rombel --}}

<div class="modal fade" id="ubah_detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route($link_role.'data.rombel.ubah', $rombel->id) }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Detail Rombel</h5>
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
                            <option value="{{ $jurusan->id }}" {{ $rombel->jurusan_id == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <select name="angkatan" id="angkatan" class="custom-select" required>
                            <option value=""></option>
                            <option value="10" {{ $rombel->angkatan == 10 ? 'selected' : '' }}>X</option>
                            <option value="11" {{ $rombel->angkatan == 11 ? 'selected' : '' }}>XI</option>
                            <option value="12" {{ $rombel->angkatan == 12 ? 'selected' : '' }}>XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel_ke">Rombel Ke-</label>
                        <select name="rombel_ke" id="rombel_ke" class="custom-select" required>
                            <option value=""></option>
                            @for ($i = 1; $i < 6; $i++)
                            <option value="{{ $i }}" {{ kelas_ke($rombel->kelas) == $i ? 'selected' : '' }}>{{ $i }}</option>
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