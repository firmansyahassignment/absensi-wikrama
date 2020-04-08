<table>
    <tr>
        <td>No</td>
        <td>NIS</td>
        <td>Nama</td>
        <td>Jenis Kelamin</td>
        <td>Rayon</td>
        <td>Rombel</td>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($rombel->siswas as $siswa)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $siswa->nis }}</td>
        <td>{{ $siswa->nama }}</td>
        <td>{{ $siswa->jenis_kelamin }}</td>
        <td>{{ $siswa->rayon->rayon }}</td>
        <td>{{ $rombel->rombel }}</td>
    </tr>
    @endforeach
</table>