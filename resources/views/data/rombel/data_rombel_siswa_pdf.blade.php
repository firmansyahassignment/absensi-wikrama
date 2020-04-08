@extends('report.pdf.pdf_decoration')

@section('title', 'ABSENSI WIKRAMA')

@section('header')
    DATA SISWA ROMBEL {{ $rombel->rombel }}
@endsection

@section('content')

<p>Berikut adalah daftar siswa rombel {{ $rombel->rombel }} : </p>

<table class="table table-sm table-bordered">
    <thead>
        <tr class="font-weight-bold text-center">
            <td>No</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Rayon</td>
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
                <td class="text-center align-middle">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td class="align-middle text-center">{{ $siswa->rayon->rayon }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p class="text-right" id="diunduhpada">#Diunduh pada tanggal : {{ format_manusia(date('Y-m-d')) }} pukul {{ date('H:i') }}</p>

@endsection