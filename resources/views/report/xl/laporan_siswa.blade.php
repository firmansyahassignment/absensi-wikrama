<table>
    <thead>
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Rayon</td>
            <td>Rombel</td>
            <td>Tanggal</td>
            <td>Keterangan</td>
            <td>Diabsen oleh</td>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @forelse (ls_range($siswa) as $absen)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->rayon->rayon }}</td>
            <td>{{ $siswa->rombel->rombel }}</td>
            <td>{{ format_local($absen->tanggal_absen) }}</td>
            <td>{{ $absen->keterangan ?? 'belum diabsen' }}</td>
            <td>{{ $absen->user->nama }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="8" align="center">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>