<?php

namespace App\Imports;

use App\Rayon;
use App\Rombel;
use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataSiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $rayon = $row['rayon'];
        $rombel = $row['rombel'];
        $rayon = Rayon::where('rayon', 'LIKE', '%'.$rayon.'%')->first()->id;
        $rombel = Rombel::where('rombel', 'LIKE', '%'.$rombel.'%')->first()->id ?? null;
        
        if ($rayon == null) {
            $rayon = Rayon::create([
                'rayon' => $row['rayon'],
                'short' => short_rayon($row['rayon']),
            ]);

            $rayon = $rayon->id;
        }

        $siswa = Siswa::where('nis', $row['nis'])->get();
        if ($siswa->count() == 0) { 
            return new Siswa([
                'nis' => $row['nis'],
                'nama' => $row['nama'],
                'rombel_id' => $rombel,
                'jenis_kelamin' => $row['jenis_kelamin'],
                'rayon_id' => $rayon
            ]);
        } else{
            $siswa = $siswa->first();
            $siswa->update([
                'nama' => $row['nama'],
                'rombel_id' => $rombel,
                'jenis_kelamin' => $row['jenis_kelamin'],
                'rayon_id' => $rayon
            ]);
        }
    }
}
