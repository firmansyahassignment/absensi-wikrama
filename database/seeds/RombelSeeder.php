<?php

use App\Rombel;
use Illuminate\Database\Seeder;

class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rombel = [
            ['rombel' => 'RPL X-1', 'angkatan' => '10', 'jurusan_id' => '1', 'kelas' => 'X-1'],
            ['rombel' => 'RPL X-2', 'angkatan' => '10', 'jurusan_id' => '1', 'kelas' => 'X-2'],
            ['rombel' => 'RPL X-3', 'angkatan' => '10', 'jurusan_id' => '1', 'kelas' => 'X-3'],
            ['rombel' => 'RPL X-4', 'angkatan' => '10', 'jurusan_id' => '1', 'kelas' => 'X-4'],
            ['rombel' => 'TKJ X-1', 'angkatan' => '10', 'jurusan_id' => '2', 'kelas' => 'X-1'],
            ['rombel' => 'TKJ X-2', 'angkatan' => '10', 'jurusan_id' => '2', 'kelas' => 'X-2'],
            ['rombel' => 'TKJ X-3', 'angkatan' => '10', 'jurusan_id' => '2', 'kelas' => 'X-3'],
            ['rombel' => 'TKJ X-4', 'angkatan' => '10', 'jurusan_id' => '2', 'kelas' => 'X-4'],
            ['rombel' => 'MMD X-1', 'angkatan' => '10', 'jurusan_id' => '3', 'kelas' => 'X-1'],
            ['rombel' => 'MMD X-2', 'angkatan' => '10', 'jurusan_id' => '3', 'kelas' => 'X-2'],
            ['rombel' => 'OTKP X-1', 'angkatan' => '10', 'jurusan_id' => '4', 'kelas' => 'X-1'],
            ['rombel' => 'OTKP X-2', 'angkatan' => '10', 'jurusan_id' => '4', 'kelas' => 'X-2'],
            ['rombel' => 'RPL XI-1', 'angkatan' => '11', 'jurusan_id' => '1', 'kelas' => 'XI-1'],
            ['rombel' => 'RPL XI-2', 'angkatan' => '11', 'jurusan_id' => '1', 'kelas' => 'XI-2'],
            ['rombel' => 'RPL XI-3', 'angkatan' => '11', 'jurusan_id' => '1', 'kelas' => 'XI-3'],
            ['rombel' => 'RPL XI-4', 'angkatan' => '11', 'jurusan_id' => '1', 'kelas' => 'XI-4'],
            ['rombel' => 'TKJ XI-1', 'angkatan' => '11', 'jurusan_id' => '2', 'kelas' => 'XI-1'],
            ['rombel' => 'TKJ XI-2', 'angkatan' => '11', 'jurusan_id' => '2', 'kelas' => 'XI-2'],
            ['rombel' => 'TKJ XI-3', 'angkatan' => '11', 'jurusan_id' => '2', 'kelas' => 'XI-3'],
            ['rombel' => 'TKJ XI-4', 'angkatan' => '11', 'jurusan_id' => '2', 'kelas' => 'XI-4'],
            ['rombel' => 'MMD XI-1', 'angkatan' => '11', 'jurusan_id' => '3', 'kelas' => 'XI-1'],
            ['rombel' => 'MMD XI-2', 'angkatan' => '11', 'jurusan_id' => '3', 'kelas' => 'XI-2'],
            ['rombel' => 'OTKP XI-1', 'angkatan' => '11', 'jurusan_id' => '4', 'kelas' => 'XI-1'],
            ['rombel' => 'OTKP XI-2', 'angkatan' => '11', 'jurusan_id' => '4', 'kelas' => 'XI-2'],
            ['rombel' => 'RPL XII-1', 'angkatan' => '12', 'jurusan_id' => '1', 'kelas' => 'XII-1'],
            ['rombel' => 'RPL XII-2', 'angkatan' => '12', 'jurusan_id' => '1', 'kelas' => 'XII-2'],
            ['rombel' => 'RPL XII-3', 'angkatan' => '12', 'jurusan_id' => '1', 'kelas' => 'XII-3'],
            ['rombel' => 'RPL XII-4', 'angkatan' => '12', 'jurusan_id' => '1', 'kelas' => 'XII-4'],
            ['rombel' => 'TKJ XII-1', 'angkatan' => '12', 'jurusan_id' => '2', 'kelas' => 'XII-1'],
            ['rombel' => 'TKJ XII-2', 'angkatan' => '12', 'jurusan_id' => '2', 'kelas' => 'XII-2'],
            ['rombel' => 'TKJ XII-3', 'angkatan' => '12', 'jurusan_id' => '2', 'kelas' => 'XII-3'],
            ['rombel' => 'TKJ XII-4', 'angkatan' => '12', 'jurusan_id' => '2', 'kelas' => 'XII-4'],
            ['rombel' => 'MMD XII-1', 'angkatan' => '12', 'jurusan_id' => '3', 'kelas' => 'XII-1'],
            ['rombel' => 'MMD XII-2', 'angkatan' => '12', 'jurusan_id' => '3', 'kelas' => 'XII-2'],
            ['rombel' => 'OTKP XII-1', 'angkatan' => '12', 'jurusan_id' => '4', 'kelas' => 'XII-1'],
            ['rombel' => 'OTKP XII-2', 'angkatan' => '12', 'jurusan_id' => '4', 'kelas' => 'XII-2'],
        ];

        for ($i=0; $i < count($rombel); $i++) { 
            Rombel::create([
                'rombel' => $rombel[$i]['rombel'],
                'angkatan' => $rombel[$i]['angkatan'],
                'jurusan_id' => $rombel[$i]['jurusan_id'],
                'kelas' => $rombel[$i]['kelas'],
             ]);
        }
    }
}
