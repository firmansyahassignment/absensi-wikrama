@extends('report.pdf.pdf_decoration')

@section('title', 'ABSENSI WIKRAMA')

@section('header')
    LAPORAN {{ strtoupper($siswa->nama) }}
@endsection

@section('content')

<p>Identitas Siswa : </p>
<table>
    <tr>
        <td class="pr-3">NIS</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->nis }}</td>
    </tr>
    <tr>
        <td class="pr-3">Nama</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->nama }}</td>
    </tr>
    <tr>
        <td class="pr-3">Rombel</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->rombel->rombel }}</td>
    </tr>
    <tr>
        <td class="pr-3">Rayon</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->rayon->rayon }}</td>
    </tr>
</table>

<br>

<p>Berikut adalah kalkulasi absensi dari tanggal {{ format_manusia($range[0]) }} hingga tanggal {{ format_manusia($range[1]) }} :</p>
<table>
    <tr>
        <td class="pr-2">Masuk</td>
        <td>:</td>
        <td class="pl-1">{{ ls_jumlah_keterangan($siswa)[0] }}</td>
    </tr>
    <tr>
        <td class="pr-2">Sakit</td>
        <td>:</td>
        <td class="pl-1">{{ ls_jumlah_keterangan($siswa)[1] }}</td>
    </tr>
    <tr>
        <td class="pr-2">Izin</td>
        <td>:</td>
        <td class="pl-1">{{ ls_jumlah_keterangan($siswa)[2] }}</td>
    </tr>
    <tr>
        <td class="pr-2">Alfa</td>
        <td>:</td>
        <td class="pl-1">{{ ls_jumlah_keterangan($siswa)[3] }}</td>
    </tr>
</table>

<br>

<p>Berikut adalah rincian tanggalnya :</p>

<table class="table table-sm table-bordered">
    <thead>
        <tr class="font-weight-bold text-center">
            <td>No</td>
            <td>Tanggal</td>
            <td>Keterangan</td>
            <td>Diabsen Oleh</td>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach (ls_range($siswa)->sortBy('tanggal_absen') as $absen)
            <tr class="text-center">
                <td>{{ $no++ }}</td>
                <td>{{ tanggal_bulan($absen->tanggal_absen) }}</td>
                <td>{{ $absen->keterangan ?? 'belum diabsen' }}</td>
                <td>{{ $absen->user->nama ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>

<p class="text-right" id="diunduhpada">#Diunduh pada tanggal : {{ format_manusia(date('Y-m-d')) }} pukul {{ date('H:i') }}</p>

@endsection