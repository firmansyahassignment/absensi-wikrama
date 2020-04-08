@extends('report.pdf.pdf_decoration')

@section('title', 'ABSENSI WIKRAMA')

@section('header')
    DATA {{ strtoupper($siswa->nama) }}
@endsection

@section('content')

<p>Berikut adalah data {{ $siswa->nama }} : </p>

<table>
    <tr>
        <td class="pr-2">NIS</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->nis }}</td>
    </tr>
    <tr>
        <td class="pr-2">Nama</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->nama }}</td>
    </tr>
    <tr>
        <td class="pr-2">Rombel</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->rombel->rombel }}</td>
    </tr>
    <tr>
        <td class="pr-2">Rayon</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->rayon->rayon }}</td>
    </tr>
</table>

@if (isset($siswa->orangtua))
<p class="mt-5">Berikut adalah username dan password akun orangtua :</p>
<table>
    <tr>
        <td class="pr-2">Username</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->orangtua->username }}</td>
    </tr>
    <tr>
        <td class="pr-2">Password</td>
        <td>:</td>
        <td class="pl-1">{{ $siswa->nis }}(<small>default</small>)</td>
    </tr>
</table>
@endif

<p class="text-right" id="diunduhpada">#Diunduh pada tanggal : {{ format_manusia(date('Y-m-d')) }} pukul {{ date('H:i') }}</p>

@endsection