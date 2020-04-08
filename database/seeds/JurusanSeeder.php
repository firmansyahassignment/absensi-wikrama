<?php

use App\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            ['jurusan' => 'Rekayasa Perangkatan Lunak', 'short' => 'RPL'],
            ['jurusan' => 'Teknik Komputer Jaringan', 'short' => 'TKJ'],
            ['jurusan' => 'Multimedia', 'short' => 'MMD'],
            ['jurusan' => 'Otomatisasi Tata Kelola Perkantoran', 'short' => 'OTKP'],
            ['jurusan' => 'Bisnis Daring dan Pemasaran', 'short' => 'BDP'],
            ['jurusan' => 'Perhotelan', 'short' => 'HTL'],
            ['jurusan' => 'Tataboga', 'short' => 'TBG'],
        ];

        for ($i=0; $i < count($jurusan); $i++) { 
            Jurusan::create([
                'jurusan' => $jurusan[$i]['jurusan'],
                'short' => $jurusan[$i]['short'],
            ]);
        }
    }
}
