@extends('layouts.app')

@section('title', 'Daftar Siswa Dilaporkan')

@section('breadcrumb')

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Daftar Siswa Dilaporkan</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Rayon</th>
                    <th>Dilaporkan Oleh</th>
                    <th>Tanggal Absen</th>
                    <th></th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($laporkans as $item)
                        <tr id="row-{{ $item->siswa->id }}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->siswa->nis ?? '' }}</td>
                            <td>{{ $item->siswa->nama ?? '' }}</td>
                            <td>{{ $item->siswa->rayon->short ?? '' }}</td>
                            <td>{{ $item->user->nama ?? '' }}</td>
                            <td>{{ format_manusia($item->tanggal_absen) }}</td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-md" data-laporkan="{{ $item->id }}" data-tanggal="{{ $item->tanggal_absen }}" data-id="{{ $item->siswa_id }}" data-toggle="modal" data-target="#absen_siswa">absen</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center"><h3 class="text-secondary">Tidak ada siswa yang dilaporkan</h3></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@section('modal')

<div class="modal fade" tabindex="-1" role="dialog" id="absen_siswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data" id="form_update_absen">
                @csrf
                <input type="hidden" name="tanggal" id="tanggal_absen">
                <input type="hidden" name="id" id="id_siswa">
                <input type="hidden" name="laporkan_id" id="laporkan_id">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Absen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <select name="keterangan" id="keterangan" class="custom-select" required>
                            <option value=""></option>
                            <option value="masuk">Masuk</option>
                            <option value="sakit">Sakit</option>
                            <option value="izin">Izin</option>
                            <option value="alfa">Alfa</option>
                        </select>
                    </div>
                    <p id="diabsen_oleh"></p>
                </div>
                <div class="modal-footer text-right bg-white">
                    <div>
                        <button type="submit" class="btn btn-primary btn-loading">Selesai</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



@section('script')


<script>
    $('#absen_siswa').on('show.bs.modal', function(e){
        var id = $(e.relatedTarget).data('id');
        var laporkan_id = $(e.relatedTarget).data('laporkan');
        var tanggal = $(e.relatedTarget).data('tanggal');

        $.ajax({
            type: "GET",
            url: "{{ route('api.data_absen_siswa') }}",
            data: {
                "id" : id,
                "tanggal" : tanggal
            },
            dataType: "JSON",
            success: function (response) {
                $('#keterangan').val(response.keterangan);
                $('#tanggal_absen').val(tanggal);
                $('#id_siswa').val(id);
                $('#laporkan_id').val(laporkan_id);

                if (response.diabsen_oleh != '') {
                    $('#diabsen_oleh').html('<p>Diabsen oleh : ' + response.diabsen_oleh + '</p>');
                }
            }
        });
    });

    $('#form_update_absen').on('submit', function(e){
        e.preventDefault();

        var data = $(this).serializeArray();

        var id = data[2]['value'];
        $.ajax({
            type: "GET",
            url: "{{ route('api.absen_siswa') }}",
            data: data,
            dataType: "JSON",
            success: function (response) {
                $('#absen_siswa').modal('hide');
                $('#row-' + id).remove();
                iziToast.success({
                    title: 'Berhasil!',
                    message: 'Absen berhasil diperbarahui',
                    position: 'bottomRight'
                });

            }
        });
    });
</script>

@endsection