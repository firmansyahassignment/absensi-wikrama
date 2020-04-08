@extends('report.pdf.pdf_decoration')

@section('title', 'ABSENSI WIKRAMA')

@section('header')
    LAPORAN ROMBEL {{ $rombel->rombel }}
@endsection

@section('content')

<p>Berikut adalah laporan absensi rombel {{ $rombel->rombel }} dari tanggal {{ format_manusia($range[0]) }} hingga tanggal {{ format_manusia($range[1]) }} :</p>

<table class="table table-sm table-bordered">
    <thead>
        <tr class="font-weight-bold text-center">
            <td>No</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Rayon</td>>
            <td>Masuk</td>
            <td>Sakit</td>
            <td>Izin</td>
            <td>Alfa</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($rombel->siswas as $siswa)
            <tr>
                <td class="text-center align-middle">{{ $no++ }}</td>
                <td class="align-middle">{{ $siswa->nis }}</td>
                <td class="text-left align-middle">{{ $siswa->nama }}</td>
                <td class="align-middle text-center">{{ $siswa->rayon->short }}</td>
                <td class="text-center align-middle">{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], 'masuk')->count() }}</td>
                <td class="text-center align-middle">{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], 'sakit')->count() }}</td>
                <td class="text-center align-middle">{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], 'izin')->count() }}</td>
                <td class="text-center align-middle">{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], 'alfa')->count() }}</td>
                <td class="text-center align-middle">{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], '')->count() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p class="text-right" id="diunduhpada">#Diunduh pada tanggal : {{ format_manusia(date('Y-m-d')) }} pukul {{ date('H:i') }}</p>

@endsection