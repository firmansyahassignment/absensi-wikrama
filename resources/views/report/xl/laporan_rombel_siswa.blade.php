<table>
    <thead>
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Rombel</td>
            <td>Rayon</td>
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
                <td>{{ $no++ }}</td>
                <td>{{ $siswa->nis }}</td>
                <td class="text-left">{{ $siswa->nama }}</td>
                <td>{{ $siswa->rayon->rayon }}</td>
                <td>{{ $siswa->rombel->rombel }}</td>
                <td>{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], 'masuk')->count() }}</td>
                <td>{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], 'sakit')->count() }}</td>
                <td>{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], 'izin')->count() }}</td>
                <td>{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], 'alfa')->count() }}</td>
                <td>{{ $siswa->absen_range([ request()->tanggal_pertama, request()->tanggal_terakhir], '')->count() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>